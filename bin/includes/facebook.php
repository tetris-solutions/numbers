<?php

namespace Tetris\Numbers;

use Tetris\Numbers\Base\Parser\FacebookCPV100Parser;
use Tetris\Numbers\Base\Parser\ViewRateParser;
use Tetris\Numbers\Generator\Facebook\Extensions\ActionsParser;
use Tetris\Numbers\Generator\Facebook\Extensions\VideoViewParser;
use Tetris\Numbers\Generator\Facebook\FacebookAttributeFactory;
use Tetris\Numbers\Generator\Facebook\FacebookMetricFactory;

function cpv100Facebook(string $spend, string $video100p)
{
    return [
        'spendProperty' => $spend,
        'actionsProperty' => $video100p,
        'actionType' => 'video_view',
        'traits' => [
            'parser' => FacebookCPV100Parser::class
        ],
        'fields' => [$spend, $video100p]
    ];
}

function viewRateFacebook(string $videoViewAction, string $impressions)
{
    return [
        'actionsProperty' => $videoViewAction,
        'impressionsProperty' => $impressions,
        'actionType' => 'video_view',
        'traits' => [
            'parser' => ViewRateParser::class
        ],
        'fields' => [$impressions, $videoViewAction]
    ];
}

function getFacebookConfig(): array
{
    $fields = array_merge(
        json_decode(file_get_contents(__DIR__ . '/../../maps/breakdowns.json'), true),
        json_decode(file_get_contents(__DIR__ . '/../../maps/insight-fields.json'), true)
    );

    $output = [
        'entities' => ['Campaign', 'Account', 'AdSet', 'Ad'],
        'metrics' => [],
        'reports' => [],
        'sources' => []
    ];

    $fields['roas'] = $fields['spend'];

    $fields['cpa'] = $fields['cpc'];
    $fields['cpr'] = $fields['cpc'];
    $fields['cpv100'] = $fields['cpc'];
    $fields['view_rate'] = $fields['ctr'];

    $validTypes = [
        'numeric string',
        'string',
        'float'
    ];

    $cloneDateStartAs = function (string $part) use (&$fields) {
        $fields[$part] = $fields['date_start'];

        return [
            'property' => 'date_start',
            'property_name' => $part
        ];
    };

    $inferredDimensions = [
        'month' => $cloneDateStartAs('month'),
        'year' => $cloneDateStartAs('year'),
        'week' => $cloneDateStartAs('week'),
        'day_of_week' => $cloneDateStartAs('day_of_week'),
        'month_of_year' => $cloneDateStartAs('month_of_year'),
        'quarter' => $cloneDateStartAs('quarter')
    ];

    function isFacebookCurrencyMetric(array $field): bool
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

    $attributeFactory = new FacebookAttributeFactory();
    $sourceFactory = new FacebookMetricFactory();

    foreach ($output['entities'] as $entity) {
        $reportName = 'FB_' . strtoupper($entity);

        $output['reports'][$reportName] = [
            'id' => $reportName,
            'attributes' => [
                'platform' => platformAttribute('Facebook', $reportName)
            ]
        ];

        foreach ($fields as $originalAttributeName => $field) {
            if (!in_array($field['type'], $validTypes)) continue;

            $attribute = $attributeFactory->create(
                $reportName,
                $entity,
                $originalAttributeName,
                $field['type'],
                true,
                $field['type'] === 'percentage',
                false,
                $field['description'] ?? null
            );

            if ($attribute->is_metric) {
                $source = $sourceFactory->create(
                    $attribute->id,
                    $attribute->property,
                    $attribute->type,
                    $entity,
                    $reportName
                );

                $output['sources'][] = $source;
                $output['metrics'][$attribute->id] = $output['metrics'][$attribute->id] ??  [
                        'id' => $attribute->id,
                        'type' => $attribute->type
                    ];
            }

            if (isset($inferredDimensions[$attribute->id])) {
                $ls = $inferredDimensions[$attribute->id] ?? [];

                foreach ($ls as $key => $value) {
                    $attribute->{$key} = $value;
                }
            }

            $output['reports'][$reportName]['attributes'][$attribute->id] = $attribute;
        }

        foreach (VideoViewParser::videoFields as $videoMetricName) {
            $attribute = $attributeFactory->create(
                $reportName,
                $entity,
                $videoMetricName,
                'decimal',
                true
            );


            $output['metrics'][$attribute->id] = $output['metrics'][$attribute->id] ?? [
                    'id' => $attribute->id,
                    'type' => $attribute->type
                ];

            $source = $sourceFactory->create(
                $attribute->id,
                $attribute->property,
                $attribute->type,
                $entity,
                $reportName
            );

            $output['sources'][] = $source;
            $output['reports'][$reportName]['attributes'][$attribute->id] = $attribute;
        }

        foreach (ActionsParser::getActionTypes() as $actionType => $name) {

            $attribute = $attributeFactory->create(
                $reportName,
                $entity,
                $actionType,
                'decimal',
                true
            );


            $output['metrics'][$attribute->id] = $output['metrics'][$attribute->id] ?? [
                    'id' => $attribute->id,
                    'type' => $attribute->type
                ];

            $source = $sourceFactory->create(
                $attribute->id,
                $attribute->property,
                $attribute->type,
                $entity,
                $reportName
            );

            $output['sources'][] = $source;

            $output['reports'][$reportName]['attributes'][$actionType] = $attribute;
        }
    }


    $output['entities'] = array_values($output['entities']);

    return $output;
}
