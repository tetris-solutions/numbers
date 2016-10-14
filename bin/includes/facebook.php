<?php

namespace Tetris\Numbers;

require __DIR__ . '/../../vendor/autoload.php';

function getFacebookConfig(): array
{
    $fields = array_merge(
        json_decode(file_get_contents(__DIR__ . '/../../maps/breakdowns.json'), true),
        json_decode(file_get_contents(__DIR__ . '/../../maps/insight-fields.json'), true)
    );
    $actionTypes = json_decode(file_get_contents(__DIR__ . '/../../maps/facebook-action-types.json'), true);

    $alternative = [
        'date_start' => 'date'
    ];

    $overrideType = [
        'impressions' => 'numeric string'
    ];

    $output = [
        'entities' => ['Campaign', 'Account', 'AdSet', 'Ad'],
        'metrics' => [],
        'reports' => [],
        'sources' => []
    ];

    $parsers = [
        'currency' => function ($property) {
            return function (string $indent) use ($property): string {
                return join(PHP_EOL . $indent, [
                    'function ($data) {',
                    '    return floatval($data->' . $property . ');',
                    '}'
                ]);
            };
        },
        'decimal' => function ($property) {
            return function (string $indent) use ($property): string {
                return join(PHP_EOL . $indent, [
                    'function ($data) {',
                    "    return (float)\$data->{$property};",
                    '}'
                ]);
            };
        },
        'raw' => function ($property) {
            return function (string $indent) use ($property): string {
                return join(PHP_EOL . $indent, [
                    'function ($data) {',
                    "    return \$data->{$property};",
                    '}'
                ]);
            };
        }
    ];

    $validTypes = [
        'numeric string',
        'string',
        'float'
    ];

    $parseActionType = function ($type) {
        return function (string $indent) use ($type): string {
            $lines = [
                'function ($data) {',
                '    foreach ($data->actions as $action) {',
                "        if (\$action['action_type'] === '{$type}') {",
                "            return (float)\$action['value'];",
                '        }',
                '    }',
                '    return NULL;',
                '}'
            ];

            return implode(PHP_EOL . $indent, $lines);
        };
    };

    $parseVideoPercentAction = function ($field) {
        return function (string $indent) use ($field): string {
            $lines = [
                'function ($data) {',
                "    foreach (\$data->{$field} as \$action) {",
                "        if (\$action['action_type'] === 'video_view') {",
                "            return (float)\$action['value'];",
                '        }',
                '    }',
                '    return NULL;',
                '}'
            ];

            return implode(PHP_EOL . $indent, $lines);
        };
    };


    function isCurrency(array $field): bool
    {
        if ($field['type'] !== 'float') return false;

        foreach (['id', 'description'] as $attribute) {
            foreach (['cost', 'spend'] as $keyword) {
                if (strpos($field[$attribute], $keyword) !== FALSE) {
                    return true;
                }
            }
        }

        return false;
    }


    foreach ($output['entities'] as $entity) {
        $reportName = 'FB_' . strtoupper($entity);

        $output['reports'][$reportName] = [
            'id' => $reportName,
            'attributes' => []
        ];

        foreach ($fields as $originalAttributeName => $field) {
            if (!in_array($field['type'], $validTypes)) continue;

            // name looks like <campaign>_field_name
            $nameStartsWithEntity = stripos($originalAttributeName, "{$entity}_") === 0;
            $attributeName = $originalAttributeName;

            if (isset($alternative[$originalAttributeName])) {
                $attributeName = $alternative[$originalAttributeName];
            } else if ($nameStartsWithEntity) {
                $attributeName = substr($originalAttributeName, strlen($entity) + 1);
            }

            if (isset($overrideType[$attributeName])) {
                $field['type'] = $overrideType[$attributeName];
            }

            $attribute = [
                'id' => $attributeName,
                'property' => $originalAttributeName,
                'type' => $field['type'],
                'is_metric' => false,
                'is_dimension' => true,
                'is_filter' => true
            ];

            $attribute['is_metric'] = $field['type'] === 'float' ||
                ($field['type'] === 'numeric string' && strpos($originalAttributeName, '_id') === FALSE);

            if ($attribute['is_metric']) {
                $attribute['is_dimension'] = false;

                if (empty($output['metrics'][$attributeName])) {
                    $output['metrics'][$attributeName] = $metric = [
                        'id' => $attributeName,
                        'type' => isCurrency($field) ? 'currency' : 'decimal'
                    ];
                } else {
                    $metric = $output['metrics'][$attributeName];
                }

                $output['sources'][] = [
                    'metric' => $attributeName,
                    'entity' => $entity,
                    'platform' => 'facebook',
                    'report' => $reportName,
                    'fields' => [$originalAttributeName],
                    'parse' => $parsers[$metric['type']]($originalAttributeName)
                ];
            }

            $output['reports'][$reportName]['attributes'][$attributeName] = $attribute;
        }

        $composedVideoMetrics = [
            'video_10_sec_watched_actions',
            'video_15_sec_watched_actions',
            'video_30_sec_watched_actions',
            'video_avg_time_watched_actions',
            'video_avg_pct_watched_actions',
            'video_complete_watched_actions',
            'video_avg_percent_watched_actions',
            'video_avg_sec_watched_actions',
            'video_p25_watched_actions',
            'video_p50_watched_actions',
            'video_p75_watched_actions',
            'video_p95_watched_actions',
            'video_p100_watched_actions'
        ];

        foreach ([25, 50, 75, 100] as $n) {
            $composedVideoMetrics[] = "video_p{$n}_watched_actions";
        }

        foreach ($composedVideoMetrics as $videoMetricName) {
            $attribute = [
                'property' => $videoMetricName,
                'is_metric' => true,
                'is_dimension' => false,
                'is_filter' => true
            ];

            if (empty($output['metrics'][$videoMetricName])) {
                $output['metrics'][$videoMetricName] = [
                    'id' => $videoMetricName,
                    'type' => 'decimal'
                ];
            }

            $output['sources'][] = [
                'metric' => $videoMetricName,
                'entity' => $entity,
                'platform' => 'facebook',
                'report' => $reportName,
                'fields' => [$videoMetricName],
                'parse' => $parseVideoPercentAction($videoMetricName)
            ];

            $output['reports'][$reportName]['attributes'][$videoMetricName] = $attribute;
        }

        foreach ($actionTypes as $type => $name) {
            $attribute = [
                'property' => $type,
                'is_metric' => true,
                'is_dimension' => false,
                'is_filter' => true
            ];

            if (empty($output['metrics'][$type])) {
                $output['metrics'][$type] = [
                    'id' => $type,
                    'type' => 'decimal'
                ];
            }

            $output['sources'][] = [
                'metric' => $type,
                'entity' => $entity,
                'platform' => 'facebook',
                'report' => $reportName,
                'fields' => ['actions'],
                'parse' => $parseActionType($type)
            ];

            $output['reports'][$reportName]['attributes'][$type] = $attribute;
        }
    }


    $output['entities'] = array_values($output['entities']);

    return $output;
}
