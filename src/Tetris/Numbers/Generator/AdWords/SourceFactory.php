<?php

namespace Tetris\Numbers\Generator\AdWords;

use Tetris\Numbers\Generator\Generator;
use Tetris\Numbers\Base\Source;
use Tetris\Numbers\Generator\AdWords\Extensions\AdWordsTrivialSum;
use Tetris\Numbers\Generator\AdWords\Extensions\AdWordsSpecialMetric;
use Tetris\Numbers\Generator\AdWords\Extensions\AdWordsInferredSum;
use Tetris\Numbers\Generator\AdWords\Extensions\AdWordsParser;
use Tetris\Numbers\Generator\Extension;

class SourceFactory extends Generator
{
    /**
     * @var TypeParser
     */
    private $parser;

    /**
     * @var array
     */
    private $extensions;

    function __construct(array $fields)
    {
        $this->parser = new TypeParser();
        $this->extensions = [
            new AdWordsParser(),
            new AdWordsTrivialSum(),
            new AdWordsSpecialMetric($fields),
            new AdWordsInferredSum()
        ];
    }

    public static function clear(array $config)
    {
        return self::clearConfig($config, [
            // @todo unmaintainable code
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
        ]);
    }

    private function normalize(array $config): array
    {
        self::add($config);
        return self::clear($config);
    }

    private function apply(array $config, Extension $extension)
    {
        return $extension->extend($config);
    }


    function create(string $id, string $property, string $type, string $entity, string $report): array
    {
        $platform = 'AdWords';
        return $this->normalize(
            array_reduce($this->extensions, [$this, 'apply'], [
                'id' => $id,
                'path' => "$platform/Sources/$entity",
                'parent' => Source::class,
                'metric' => $id,
                'entity' => $entity,
                'traits' => [],
                'platform' => $platform,
                'report' => $report,
                'fields' => [$property],
                'parse' => $this->parser->getMetricParser($type, $property),
                // temp
                'property' => $property,
                'type' => $type,
            ])
        );
    }
}