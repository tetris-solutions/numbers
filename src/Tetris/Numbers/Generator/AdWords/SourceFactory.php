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
            new AdWordsTrivialSum(),
            new AdWordsSpecialMetric($fields),
            new AdWordsInferredSum(),
            new AdWordsParser()
        ];
    }

    private function normalize(array $config): array
    {
        self::add($config);

        unset($config['id']);
        unset($config['property']);
        unset($config['type']);
        unset($config['traits']);
        unset($config['interfaces']);
        unset($config['parent']);

        $config['platform'] = strtolower($config['platform']);

        return $config;
    }

    private function apply(array $config, Extension $extension)
    {
        return $extension->extend($config);
    }

    function create(string $id, string $property, string $type, string $entity, string $report): array
    {
        return $this->normalize(
            array_reduce($this->extensions, [$this, 'apply'], [
                'id' => $id,
                'parent' => Source::class,
                'metric' => $id,
                'entity' => $entity,
                'traits' => [],
                'interfaces' => [],
                'platform' => 'AdWords',
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