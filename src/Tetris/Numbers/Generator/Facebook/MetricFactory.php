<?php

namespace Tetris\Numbers\Generator\Facebook;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\TransientMetric;
use Tetris\Numbers\Utils\ArrayUtils;
use Tetris\Numbers\Generator\AdWords\LegacyTypeParser;

class MetricFactory
{
    /**
     * @var LegacyTypeParser
     */
    private $legacyTypeParser;

    /**
     * @var array
     */
    private $extensions;

    function __construct(array $fields)
    {
        $this->legacyTypeParser = new LegacyTypeParser();
        $this->extensions = [

        ];
    }

    static function clear(array $config): array
    {
        $config = ArrayUtils::omit($config,
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
            'videoViewsMetric');

        if (isset($config['platform'])) {
            $config['platform'] = strtolower($config['platform']);
        }

        return $config;
    }

    private function apply(TransientMetric $config, Extension $extension): TransientMetric
    {
        return $extension->extend($config);
    }


    function create(string $id, string $property, string $type, string $entity, string $report): TransientMetric
    {
        $source = new TransientMetric();

        $source->id = $id;
        $source->platform = 'Facebook';
        $source->path = "{$source->platform}/Metrics/$entity";
        $source->parent = Metric::class;
        $source->metric = $id;
        $source->entity = $entity;
        $source->fields = [$property];
        $source->property = $property;
        $source->type = $type;
        $source->report = $report;
        $source->parse = $this->legacyTypeParser->getMetricParser($type, $property);

        return array_reduce($this->extensions, [$this, 'apply'], $source);
    }
}