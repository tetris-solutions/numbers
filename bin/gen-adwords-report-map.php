#!/usr/bin/env php
<?php

namespace Tetris\Numbers;

require __DIR__ . '/../vendor/autoload.php';

$names = require(__DIR__ . '/../src/fields.php');

$mappings = json_decode(file_get_contents(__DIR__ . '/../vendor/tetris/adwords/src/Tetris/Adwords/report-mappings.json'), true);

$output = [
    'entities' => [],
    'metrics' => [],
    'reports' => [],
    'sources' => []
];

$eval = [
    'percentage' => function ($property) {
        return 'floatval(str_replace("%", "", $data->' . $property . ')) / 100';
    },
    'currency' => function ($property) {
        return '(float)$data->' . $property;
    },
    'quantity' => function ($property) {
        return '(float)$data->' . $property;
    },
    'raw' => function ($property) {
        return '$data->' . $property;
    }
];

foreach ($mappings as $reportName => $fields) {
    $output['reports'][$reportName] = [
        'id' => $reportName,
        'attributes' => []
    ];

    $entity = ucfirst(strtolower(explode('_', $reportName)[0]));
    $output['entities'][$entity] = $entity;

    foreach ($fields as $originalAttributeName => $field) {
        if (!isset($names['en']['adwords'][$originalAttributeName])) continue;

        // name looks like <Campaign>FieldName
        $nameStartsWithEntity = strpos($originalAttributeName, $entity) === 0;
        $attributeName = strtolower($originalAttributeName);

        if ($nameStartsWithEntity) {
            $attributeName = substr($attributeName, strlen($entity));
        }

        $attribute = [
            'property' => $originalAttributeName,
            'names' => [
                'en' => $names['en']['adwords'][$originalAttributeName],
                'pt-BR' => $names['pt-BR']['adwords'][$originalAttributeName]
            ]
        ];

        $attribute['is_metric'] = $isMetric = strtolower($field['Behavior']) === 'metric';
        $attribute['is_filter'] = $field['Filterable'];
        $attribute['is_dimension'] = !$isMetric;

        if ($isMetric) {
            if (empty($output['metrics'][$attributeName])) {
                $metric = [
                    'id' => $attributeName,
                    'type' => 'quantity',
                    'names' => $attribute['names']
                ];

                if ($field['SpecialValue']) {
                    $metric['type'] = 'raw';
                } else if ($field['Percentage']) {
                    $metric['type'] = 'percentage';
                } else if ($field['Type'] === 'Money') {
                    $metric['type'] = 'currency';
                }

                $output['metrics'][$attributeName] = $metric;
            } else {
                $metric = $output['metrics'][$attributeName];
            }

            $output['sources'][] = [
                'metric' => $attributeName,
                'entity' => $entity,
                'platform' => 'adwords',
                'report' => $reportName,
                'fields' => [$originalAttributeName],
                'eval' => $eval[$metric['type']]($originalAttributeName)
            ];
            $output['metrics'][$attributeName] = $metric;
        }

        if (isset($output['reports'][$reportName]['attributes'][$attributeName])) {
            echo "replaced: {$attributeName}\n";
        }

        $output['reports'][$reportName]['attributes'][$attributeName] = $attribute;
    }
}

$output['entities'] = array_values($output['entities']);

file_put_contents(
    __DIR__ . '/../maps/adwords.json',
    json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
);