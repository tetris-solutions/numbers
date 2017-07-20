<?php

namespace Tetris\Numbers\Generator\AdWords;


class TypeParser
{
    private $map;

    function __construct()
    {
        $this->map = [
            'list' => \Tetris\Numbers\makeParserFromSource('json'),
            'percentage' => \Tetris\Numbers\makeParserFromSource('percent'),
            'currency' => \Tetris\Numbers\makeParserFromSource('decimal'),
            'decimal' => \Tetris\Numbers\makeParserFromSource('decimal'),
            'integer' => \Tetris\Numbers\makeParserFromSource('integer'),
            'raw' => \Tetris\Numbers\makeParserFromSource('raw'),
            'special' => \Tetris\Numbers\makeParserFromSource('special-value')
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
    function getFactory(string $type, string $property)
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