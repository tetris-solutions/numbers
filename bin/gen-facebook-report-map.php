#!/usr/bin/env php
<?php

namespace Tetris\Numbers;

require __DIR__ . '/../vendor/autoload.php';

$fields = json_decode(file_get_contents(__DIR__ . '/../maps/insight-fields.json'), true);

$reportName = 'FB_GENERIC';

$filterable = ['id'];

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


foreach ($output['entities'] as $entity) {
    $reportName = 'FB_' . strtoupper($entity);

    $output['reports'][$reportName] = [
        'id' => $reportName,
        'attributes' => []
    ];

    foreach ($fields as $originalAttributeName => $field) {
        if (!in_array($field['type'], $validTypes)) continue;

        $userFriendlyName = ucwords(str_replace('_', ' ', $originalAttributeName));

        // name looks like campaign_field_name
        $nameStartsWithEntity = stripos($originalAttributeName, "{$entity}_") === 0;

        if ($nameStartsWithEntity) {
            $attributeName = substr($originalAttributeName, strlen($entity) + 1);
        } else {
            $attributeName = $originalAttributeName;
        }

        $attribute = [
            'property' => $originalAttributeName,
            'names' => [
                'en' => $userFriendlyName,
                'pt-BR' => $userFriendlyName
            ],
            'is_metric' => false,
            'is_dimension' => true,
            'is_filter' => in_array($attributeName, $filterable)
        ];

        $attribute['is_metric'] = $field['type'] === 'float' ||
            ($field['type'] === 'numeric string' && strpos($originalAttributeName, '_id') === FALSE);

        if ($attribute['is_metric']) {
            $attribute['is_dimension'] = false;

            if (empty($output['metircs'][$attributeName])) {
                $output['metrics'][$attributeName] = $metric = [
                    'id' => $attributeName,
                    'type' => isCurrency($field) ? 'currency' : 'quantity',
                    'names' => $attribute['names']
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
                'eval' => $eval[$metric['type']]($originalAttributeName)
            ];
        }

        $output['reports'][$reportName]['attributes'][$attributeName] = $attribute;
    }
}


$output['entities'] = array_values($output['entities']);

echo json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
