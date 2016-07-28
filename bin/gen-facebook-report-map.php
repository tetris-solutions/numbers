#!/usr/bin/env php
<?php

namespace Tetris\Numbers;

require __DIR__ . '/../vendor/autoload.php';

$fields = json_decode(file_get_contents(__DIR__ . '/../maps/insight-fields.json'), true);

$reportName = 'FB_GENERIC';

$output = [
    'entities' => ['Campaign', 'Account'],
    'metrics' => [],
    'reports' => [
        $reportName => [
            'id' => $reportName,
            'attributes' => []
        ]
    ],
    'sources' => []
];

$eval = [
    'currency' => function ($property) {
        return 'intval($data->' . $property . ') / 100';
    },
    'quantity' => function ($property) {
        return '(float)$data->' . $property;
    },
    'raw' => function ($property) {
        return '$data->' . $property;
    }
];

$validTypes = [
    'numeric string',
    'string',
    'float'
];

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

foreach ($fields as $property => $field) {
    if (!in_array($field['type'], $validTypes)) continue;

    $name = ucwords(str_replace('_', ' ', $property));

    $metaData = [
        'property' => $property,
        'names' => [
            'en' => $name,
            'pt-BR' => $name
        ],
        'is_metric' => false,
        'is_dimension' => true,
        'is_filter' => false
    ];

    $metaData['is_metric'] = $field['type'] === 'float' ||
        ($field['type'] === 'numeric string' && strpos($property, '_id') === FALSE);

    if ($metaData['is_metric']) {
        $output['metrics'][$property] = $metric = [
            'id' => $property,
            'type' => isCurrency($field) ? 'currency' : 'quantity',
            'names' => $metaData['names']
        ];

        foreach ($output['entities'] as $entity) {
            $output['sources'][] = [
                'metric' => $property,
                'entity' => $entity,
                'platform' => 'facebook',
                'report' => $reportName,
                'fields' => [$property],
                'eval' => $eval[$metric['type']]($property)
            ];
        }
    }

    $output['reports'][$reportName]['attributes'][$property] = $metaData;
}

$output['entities'] = array_values($output['entities']);

echo json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
