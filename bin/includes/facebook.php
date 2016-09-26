<?php

namespace Tetris\Numbers;

require __DIR__ . '/../../vendor/autoload.php';

function getFacebookConfig(): array
{
    $fields = json_decode(file_get_contents(__DIR__ . '/../../maps/insight-fields.json'), true);
    $actionTypes = json_decode(file_get_contents(__DIR__ . '/../../maps/facebook-action-types.json'), true);

    $filterable = ['id'];

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
                    '    return intval($data->' . $property . ') / 100;',
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
                'is_metric' => false,
                'is_dimension' => true,
                'is_filter' => in_array($attributeName, $filterable)
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

        foreach ([25, 50, 75, 100] as $percent) {
            $videoPercentActionsFieldName = "video_p{$percent}_watched_actions";
            $attribute = [
                'property' => $videoPercentActionsFieldName,
                'is_metric' => true,
                'is_dimension' => false,
                'is_filter' => false
            ];

            if (empty($output['metrics'][$videoPercentActionsFieldName])) {
                $output['metrics'][$videoPercentActionsFieldName] = [
                    'id' => $videoPercentActionsFieldName,
                    'type' => 'decimal'
                ];
            }

            $output['sources'][] = [
                'metric' => $videoPercentActionsFieldName,
                'entity' => $entity,
                'platform' => 'facebook',
                'report' => $reportName,
                'fields' => [$videoPercentActionsFieldName],
                'parse' => $parseVideoPercentAction($videoPercentActionsFieldName)
            ];

            $output['reports'][$reportName]['attributes'][$videoPercentActionsFieldName] = $attribute;
        }

        foreach ($actionTypes as $type => $name) {
            $attribute = [
                'property' => $type,
                'is_metric' => true,
                'is_dimension' => false,
                'is_filter' => false
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
