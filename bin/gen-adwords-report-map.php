#!/usr/bin/env php
<?php

namespace Tetris\Numbers;

require __DIR__ . '/../vendor/autoload.php';

$mappings = json_decode(file_get_contents(__DIR__ . '/../vendor/tetris/adwords/src/Tetris/Adwords/report-mappings.json'), true);

$alternativeName = [
    'campaignid' => 'id'
];

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

foreach ($mappings as $reportName => $properties) {
    $output['reports'][$reportName] = [
        'id' => $reportName,
        'attributes' => []
    ];

    $entity = ucfirst(strtolower(explode('_', $reportName)[0]));
    $output['entities'][$entity] = $entity;

    foreach ($properties as $name => $metadata) {
        $id = strtolower($name);

        // name looks like <Campaign>FieldName
        $nameStartsWithEntity = strpos($name, $entity) === 0;

        if ($nameStartsWithEntity) {
            $id = substr($id, strlen($entity));
        }

        if (isset($alternativeName[$id])) {
            $id = $alternativeName[$id];
        }

        $field = [
            'property' => $name,
            'names' => [
                'en' => $metadata['DisplayName'],
                'pt-BR' => $metadata['DisplayName']
            ]
        ];

        $field['is_metric'] = $isMetric = strtolower($metadata['Behavior']) === 'metric';
        $field['is_filter'] = $metadata['Filterable'];
        $field['is_dimension'] = !$isMetric;

        if ($isMetric) {
            if (empty($output['metrics'][$id])) {
                $metric = [
                    'id' => $id,
                    'type' => 'quantity',
                    'names' => $field['names']
                ];

                if ($metadata['SpecialValue']) {
                    $metric['type'] = 'raw';
                } else if ($metadata['Percentage']) {
                    $metric['type'] = 'percentage';
                } else if ($metadata['Type'] === 'Money') {
                    $metric['type'] = 'currency';
                }

                $output['metrics'][$id] = $metric;
            }

            $metric = $output['metrics'][$id];
            $output['sources'][] = [
                'metric' => $id,
                'entity' => $entity,
                'platform' => 'adwords',
                'report' => $reportName,
                'fields' => [$name],
                'eval' => $eval[$metric['type']]($name)
            ];
            $output['metrics'][$id] = $metric;
        }

        if (isset($output['reports'][$reportName]['attributes'][$id])) {
            echo "replaced: {$id}\n";
        }

        $output['reports'][$reportName]['attributes'][$id] = $field;
    }
}

$output['entities'] = array_values($output['entities']);

echo json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
