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
        'impressions' => 'numeric string',
        'ctr' => 'percentage'
    ];

    $output = [
        'entities' => ['Campaign', 'Account', 'AdSet', 'Ad'],
        'metrics' => [],
        'reports' => [],
        'sources' => []
    ];

    $parsers = [
        'currency' => makeParserFromSource('decimal'),
        'percentage' => makeParserFromSource('percent'),
        'decimal' => makeParserFromSource('decimal'),
        'raw' => makeParserFromSource('raw')
    ];

    $actionValueParser = makeParserFromSource('action');

    $inferredMetricSumConfig = [
        'cpc' => ratioSum('spend', 'clicks'),
        'cpm' => ratioSum('spend', 'impressions'),
        'ctr' => ratioSum('clicks', 'impressions'),
        'frequency' => ratioSum('impressions', 'reach'),
        'cost_per_estimated_ad_recallers' => ratioSum('spend', 'estimated_ad_recallers'),
        'cost_per_inline_link_click' => ratioSum('spend', 'inline_link_clicks'),
        'cost_per_inline_post_engagement' => ratioSum('spend', 'inline_post_engagement'),
        'cost_per_total_action' => ratioSum('spend', 'total_actions'),
        'inline_link_click_ctr' => ratioSum('inline_link_clicks', 'impressions'),
        'newsfeed_avg_position' => weightedAverage('newsfeed_avg_position', 'impressions'),
        'roas' => ratioSum('total_action_value', 'spend')
    ];

    $simpleSumMetrics = [
        'app_store_clicks',
        'call_to_action_clicks',
        'clicks',
        'deeplink_clicks',
        'impressions',
        'newsfeed_clicks',
        'newsfeed_impressions',
        'social_clicks',
        'social_impressions',
        'social_spend',
        'spend',
        'total_actions',
        'total_action_value',
        'total_unique_actions',
        'unique_clicks',
        'unique_impressions',
        'unique_social_clicks',
        'unique_social_impressions',
        'website_clicks',
        'inline_link_clicks',
        'inline_post_engagement',
        'unique_inline_link_clicks',
        'estimated_ad_recallers',
        'canvas_avg_view_time',
        'canvas_avg_view_percent',
        'video_avg_percent_watched_actions',
        'video_avg_time_watched_actions'
    ];

    $specialMetricConfig = [
        'roas' => roas('total_action_value', 'spend')
    ];

    $fields['roas'] = $fields['total_action_value'];

    $numericTypes = [
        'percentage',
        'float'
    ];

    $validTypes = [
        'numeric string',
        'string',
        'float'
    ];


    function isCurrency(array $field): bool
    {
        $attributes = ['id', 'description'];
        $keywords = ['cost', 'spend', 'amount'];

        foreach ($attributes as $attribute) {
            foreach ($keywords as $keyword) {
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

            $attribute['is_metric'] = in_array($field['type'], $numericTypes) || (
                    $field['type'] === 'numeric string' &&
                    strpos($originalAttributeName, '_id') === FALSE
                );

            if ($attribute['is_metric']) {
                $attribute['is_dimension'] = false;

                if (empty($output['metrics'][$attributeName])) {
                    $metric = [
                        'id' => $attributeName,
                        'type' => isCurrency($field) ? 'currency' : 'decimal'
                    ];

                    if (isCurrency($field)) {
                        $metric['type'] = 'currency';
                    } else {
                        $metric['type'] = $field['type'] === 'percentage'
                            ? 'percentage'
                            : 'decimal';
                    }

                    $output['metrics'][$attributeName] = $metric;
                } else {
                    $metric = $output['metrics'][$attributeName];
                }

                $source = [
                    'metric' => $attributeName,
                    'entity' => $entity,
                    'platform' => 'facebook',
                    'report' => $reportName,
                    'fields' => [$originalAttributeName],
                    'parse' => $parsers[$metric['type']]($originalAttributeName),
                    'sum' => null
                ];

                if (in_array($attributeName, $simpleSumMetrics)) {
                    $source['sum'] = simpleSum($attribute['id']);
                }

                if (isset($specialMetricConfig[$attributeName])) {
                    $source = array_merge($source, $specialMetricConfig[$attributeName]);
                }

                if (isset($inferredMetricSumConfig[$attributeName])) {
                    $source = array_merge($source, $inferredMetricSumConfig[$attributeName]);
                }

                $output['sources'][] = $source;
            }

            $output['reports'][$reportName]['attributes'][$attributeName] = $attribute;
        }

        $composedVideoMetrics = [
            'video_10_sec_watched_actions',
            'video_15_sec_watched_actions',
            'video_30_sec_watched_actions',
            'video_complete_watched_actions',
            'video_p25_watched_actions',
            'video_p50_watched_actions',
            'video_p75_watched_actions',
            'video_p95_watched_actions',
            'video_p100_watched_actions',

            'video_avg_time_watched_actions',
            'video_avg_pct_watched_actions',
            'video_avg_percent_watched_actions',
            'video_avg_sec_watched_actions',
        ];

        foreach ($composedVideoMetrics as $videoMetricName) {
            $isAverage = strpos($videoMetricName, '_avg_') !== FALSE;

            $attribute = [
                'id' => $videoMetricName,
                'property' => $videoMetricName,
                'type' => 'decimal',
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
                'parse' => $actionValueParser($videoMetricName, 'video_view'),
                'sum' => $isAverage ? null : simpleSum($attribute['id'])
            ];

            $output['reports'][$reportName]['attributes'][$videoMetricName] = $attribute;
        }

        foreach ($actionTypes as $actionType => $name) {
            $attribute = [
                'id' => $actionType,
                'property' => $actionType,
                'type' => 'decimal',
                'is_metric' => true,
                'is_dimension' => false,
                'is_filter' => true
            ];

            if (empty($output['metrics'][$actionType])) {
                $output['metrics'][$actionType] = [
                    'id' => $actionType,
                    'type' => 'decimal'
                ];
            }

            $output['sources'][] = [
                'metric' => $actionType,
                'entity' => $entity,
                'platform' => 'facebook',
                'report' => $reportName,
                'fields' => ['actions'],
                'parse' => $actionValueParser('actions', $actionType),
                'sum' => simpleSum($attribute['id'])
            ];

            $output['reports'][$reportName]['attributes'][$actionType] = $attribute;
        }
    }


    $output['entities'] = array_values($output['entities']);

    return $output;
}
