<?php

namespace Tetris\Numbers;

use Tetris\Numbers\Generator\Vtex\VtexAttributeFactory;
use Tetris\Numbers\Generator\Vtex\VtexMetricFactory;

function getVtexConfig(): array
{
    $fieldsConfig = json_decode(file_get_contents(__DIR__ . '/../../maps/vtex-order-fields.json'), true);

    $reportName = 'VTEX_ORDER';
    $entity = 'Order';

    $output = [
        'entities' => [$entity],
        'metrics' => [],
        'reports' => [
            $reportName => [
                'id' => $reportName,
                'attributes' => [
                    'platform' => platformAttribute('Vtex', $reportName)
                ]
            ]
        ],
        'sources' => []
    ];


    $attributeFactory = new VtexAttributeFactory();
    $sourceFactory = new VtexMetricFactory();

    foreach ($fieldsConfig as $originalAttributeName => $config) {
        $attribute = $attributeFactory->create(
            $reportName,
            $entity,
            $originalAttributeName,
            $config['type'],
            false,
            false,
            false,
            $config['description'],
            $config['endpoint']
        );

        if ($attribute->is_metric) {
            $source = $sourceFactory->create(
                $attribute->id,
                $attribute->property,
                $attribute->type,
                $entity,
                $reportName,
                $config['endpoint']
            );

            $output['sources'][] = $source;
        }

        $output['reports'][$reportName]['attributes'][$attribute->id] = $attribute;
    }

    return $output;
}
