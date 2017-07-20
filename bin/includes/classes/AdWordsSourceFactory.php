<?php

namespace Tetris\Numbers;

class AdWordsSourceFactory
{
    /**
     * @var AdWordsTypeParser
     */
    private $parser;

    /**
     * @var array
     */
    private $extensions;

    function __construct(array $fields)
    {
        $this->parser = new AdWordsTypeParser();
        $this->extensions = [
            new AdWordsTrivialSum(),
            new AdWordsSpecialMetric($fields),
            new AdWordsInferredSum()
        ];
    }

    private function normalize(array $config): array
    {
        unset($config['id']);
        unset($config['property']);
        unset($config['type']);
        unset($config['traits']);
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
                'metric' => $id,
                'entity' => $entity,
                'platform' => 'adwords',
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