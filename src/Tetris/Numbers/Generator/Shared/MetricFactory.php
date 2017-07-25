<?php

namespace Tetris\Numbers\Generator\Shared;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Utils\ArrayUtils;

class MetricFactory extends FieldFactory
{
    const fieldToRemoveFromLegacy = [
        'id',
        'property',
        'path',
        'type',
        'traits',
        'interfaces',
        'parent',
        'impressionsMetric',
        'impressionShareMetric',
        'auxiliaryMetrics',
        'costProperty',
        'views100PercentileProperty',
        'viewsProperty',
        'costMetric',
        'views100PercentileMetric',
        'viewsMetric',
        'weightMetric',
        'dividendMetric',
        'divisorMetric',
        'dividendProperty',
        'divisorProperty',
        'videoQuartileMetric',
        'videoViewsMetric'
    ];

    protected static $parentClass = Metric::class;


    /**
     * @var array
     */
    protected $extensions;

    static function clear(array $config): array
    {
        $config = ArrayUtils::omit($config, ...self::fieldToRemoveFromLegacy);

        if (isset($config['platform'])) {
            $config['platform'] = strtolower($config['platform']);
        }

        return $config;
    }

    protected function apply(TransientMetric $config, Extension $extension): TransientMetric
    {
        return $extension->extend($config);
    }


    function create(string $id, string $property, string $type, string $entity, string $report): TransientMetric
    {
        $source = new TransientMetric();

        $source->id = $id;
        $source->platform = $this->platform;
        $source->path = "{$source->platform}/Metrics/$entity";
        $source->parent = self::$parentClass;
        $source->metric = $id;
        $source->entity = $entity;
        $source->fields = [$property];
        $source->property = $property;
        $source->type = $type;
        $source->report = $report;
        $source->parse = $this->legacyParser->getMetricParser($type, $property);

        return array_reduce($this->extensions, [$this, 'apply'], $source);
    }
}