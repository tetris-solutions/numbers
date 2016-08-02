<?php
namespace Tetris\Numbers;

require __DIR__ . '/../../vendor/autoload.php';

$mappings = json_decode(file_get_contents(__DIR__ . '/../../vendor/tetris/adwords/src/Tetris/Adwords/report-mappings.json'), true);

$output = [
    'entities' => [],
    'metrics' => [],
    'reports' => [],
    'sources' => []
];

$eval = [
    'percentage' => function ($property) {
        return function (string $indent) use ($property): string {
            return join(PHP_EOL . $indent, [
                'function ($data): float {',
                "  return floatval(str_replace('%', '', \$data->$property)) / 100;",
                '}'
            ]);
        };
    },
    'currency' => function ($property) {
        return function (string $indent) use ($property): string {
            return join(PHP_EOL . $indent, [
                'function ($data): float {',
                "  return (float)\$data->$property;",
                '}'
            ]);
        };
    },
    'quantity' => function ($property) {
        return function (string $indent) use ($property): string {
            return join(PHP_EOL . $indent, [
                'function ($data): int {',
                "  return (int)\$data->$property;",
                '}'
            ]);
        };

    },
    'raw' => function ($property) {
        return function (string $indent) use ($property): string {
            return join(PHP_EOL . $indent, [
                'function ($data) {',
                "  return \$data->$property;",
                '}'
            ]);
        };
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
        // name looks like <Campaign>FieldName
        $nameStartsWithEntity = strpos($originalAttributeName, $entity) === 0;
        $attributeName = strtolower($originalAttributeName);

        if ($nameStartsWithEntity) {
            $attributeName = substr($attributeName, strlen($entity));
        }

        $isMetric = strtolower($field['Behavior']) === 'metric';

        $attribute = [
            'id' => $attributeName,
            'property' => $originalAttributeName,
            'is_filter' => $field['Filterable'],
            'is_metric' => $isMetric,
            'is_dimension' => !$isMetric
        ];

        if ($isMetric) {
            if (empty($output['metrics'][$attributeName])) {
                $metric = [
                    'id' => $attributeName,
                    'type' => 'quantity'
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

return $output;