<?php

namespace Tetris\Numbers\Report\CrossPlatform;

class Translation
{
    public $platformAttribute;
    public $globalAttribute;
    private $fn;

    function __construct(string $platformAttribute, string $globalAttribute, callable $transform)
    {
        $this->platformAttribute = $platformAttribute;
        $this->globalAttribute = $globalAttribute;
        $this->fn = $transform;
    }

    function transform($value, $metaData = null)
    {
        $fn = $this->fn;

        return $fn($value, $metaData);
    }
}

