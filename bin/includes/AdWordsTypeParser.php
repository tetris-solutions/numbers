<?php

namespace Tetris\Numbers;


class AdWordsTypeParser
{
    private $map;

    function __construct()
    {
        $this->map = [
            'list' => makeParserFromSource('json'),
            'percentage' => makeParserFromSource('percent'),
            'currency' => makeParserFromSource('decimal'),
            'decimal' => makeParserFromSource('decimal'),
            'integer' => makeParserFromSource('integer'),
            'raw' => makeParserFromSource('raw'),
            'special' => makeParserFromSource('special-value')
        ];
    }

    function validate(string $type): string
    {
        return isset($this->map[$type]) ? $type : 'raw';
    }

    /**
     * @param string $type
     * @param string $property
     * @return callable|null
     */
    private function getFactory(string $type, string $property)
    {
        return isset($this->map[$type])
            ? $this->map[$type]($property)
            : null;
    }

    function getMetricParser(string $type, string $property)
    {
        return $this->getFactory($type, $property);
    }

    function getDimensionParser(array $dimension)
    {
        return $dimension['type'] === 'integer' || $dimension['type'] === 'list'
            ? $this->getFactory($dimension['type'], $dimension['property'])
            : null;
    }
}