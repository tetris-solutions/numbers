<?php

namespace Tetris\Numbers;

require __DIR__ . '/../../vendor/autoload.php';


function cpv100Facebook(string $spend, string $video100p)
{
    $source = makeParserFromSource('cpv100-facebook');

    return [
        'fields' => [$spend, $video100p],
        'parse' => $source($spend, $video100p, 'video_view')
    ];
}

function viewRateFacebook(string $videoViewAction, string $impressions)
{
    $source = makeParserFromSource('view-rate-facebook');

    return [
        'fields' => [$impressions, $videoViewAction],
        'parse' => $source($videoViewAction, 'video_view', $impressions)
    ];
}

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
        'ctr' => 'percentage',
        'view_rate' => 'percentage',
        'cost_per_10_sec_video_view' => 'currency'
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
        'cpc' => customRatioSum('spend', 'clicks'),
        'cpm' => customRatioSum('spend', 'impressions'),
        'ctr' => customRatioSum('clicks', 'impressions'),
        'frequency' => customRatioSum('impressions', 'reach'),
        'cost_per_estimated_ad_recallers' => customRatioSum('spend', 'estimated_ad_recallers'),
        'cost_per_inline_link_click' => customRatioSum('spend', 'inline_link_clicks'),
        'cost_per_inline_post_engagement' => customRatioSum('spend', 'inline_post_engagement'),
        'cost_per_total_action' => customRatioSum('spend', 'total_actions'),
        'inline_link_click_ctr' => customRatioSum('inline_link_clicks', 'impressions'),
        'newsfeed_avg_position' => weightedAverage('newsfeed_avg_position', 'impressions'),
        'roas' => customRatioSum('total_action_value', 'spend'),
        'cpa' => customRatioSum('total_actions', 'total_action_value'),
        'cpr' => customRatioSum('spend', 'reach'),
        'cpv100' => customRatioSum('spend', 'video_p100_watched_actions'),
        'view_rate' => customRatioSum('video_view', 'impressions')
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
        'roas' => customRatioParser('total_action_value', 'spend'),
        'cpa' => customRatioParser('total_actions', 'total_action_value'),
        'cpr' => customRatioParser('spend', 'reach'),
        'cpv100' => cpv100Facebook('spend', 'video_p100_watched_actions'),
        'view_rate' => viewRateFacebook('actions', 'impressions')
    ];

    $fields['roas'] = $fields['spend'];

    $fields['cpa'] = $fields['cpc'];
    $fields['cpr'] = $fields['cpc'];
    $fields['cpv100'] = $fields['cpc'];
    $fields['view_rate'] = $fields['ctr'];

    $numericTypes = [
        'percentage',
        'float'
    ];

    $validTypes = [
        'numeric string',
        'string',
        'float'
    ];

    $fbDatePart = function (string $part) use (&$fields) {
      $fields[$part] = $fields['date_start'];

      return [
          'property' => 'date_start',
          'property_name' => $part,
          'parse' => makeParserFromSource("fb-{$part}")('date_start')
      ];
    };

    $inferredDimensions = [
        'month' => $fbDatePart('month'),
        'year' => $fbDatePart('year'),
        'week' => $fbDatePart('week'),
        'day_of_week' => $fbDatePart('day_of_week')
    ];

    function isCurrency(array $field): bool
    {
        $attributes = ['id', 'description'];
        $keywords = ['cost', 'spend', 'amount'];

        foreach ($attributes as $attribute) {
            foreach ($keywords as $keyword) {
                if (isset($field[$attribute]) && strpos($field[$attribute], $keyword) !== FALSE) {
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
            } else if (isset($inferredDimensions[$attributeName])) {
              $attribute = array_merge($attribute, $inferredDimensions[$attributeName]);
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

            'cost_per_10_sec_video_view'
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
                    'type' => isCurrency($attribute) ? 'currency' : 'decimal'
                ];
            }

            $attribute['type'] = $output['metrics'][$videoMetricName]['type'];

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
