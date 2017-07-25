<?php

namespace Tetris\Numbers\Generator\AdWords;

use Tetris\Numbers\Base\Metric;
use Tetris\Numbers\Generator\AdWords\Extensions\AdWordsTrivialSum;
use Tetris\Numbers\Generator\AdWords\Extensions\AdWordsSpecialMetric;
use Tetris\Numbers\Generator\AdWords\Extensions\AdWordsInferredSum;
use Tetris\Numbers\Generator\AdWords\Extensions\AdWordsParser;
use Tetris\Numbers\Generator\Extension;
use Tetris\Numbers\Generator\TransientMetric;
use Tetris\Numbers\Utils\ArrayUtils;

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
            new AdWordsParser(),
            new AdWordsTrivialSum(),
            new AdWordsSpecialMetric($fields),
            new AdWordsInferredSum()
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
        $source->platform = 'AdWords';
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