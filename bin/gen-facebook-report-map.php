#!/usr/bin/env php
<?php

namespace Tetris\Numbers;

require __DIR__ . '/../vendor/autoload.php';

$names = require(__DIR__ . '/../src/fields.php');

$fields = json_decode(file_get_contents(__DIR__ . '/../maps/insight-fields.json'), true);

$filterable = ['id'];

$excluded = [
    'date_stop'
];

$alternative = [
    'date_start' => 'date'
];

$overrideType = [
    'impressions' => 'numeric string'
];

$output = [
    'entities' => ['Campaign', 'Account'],
    'metrics' => [],
    'reports' => [],
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
        if (in_array($originalAttributeName, $excluded)) continue;
        if (!isset($names['en']['facebook'][$originalAttributeName])) continue;

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
            'property' => $originalAttributeName,
            'names' => [
                'en' => $names['en']['facebook'][$originalAttributeName],
                'pt-BR' => $names['pt-BR']['facebook'][$originalAttributeName],
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

file_put_contents(
    __DIR__ . '/../maps/facebook.json',
    json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
);