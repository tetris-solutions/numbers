<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait TriangulationParser
{
    use ComplexValueParser;

    /**
     * @var array
     */
    public $auxiliaryMetrics;

    function parse($source, Query $query)
    {
        $parsedValue = $this->transform($this->getValue($source));

        if (!is_array($parsedValue)) return $parsedValue;

        $remaining = 1;

        foreach ($this->auxiliaryMetrics as $property) {
            $aux = $this->transform($source->{$property});

            if (!is_numeric($aux)) return $parsedValue;

            $remaining -= $aux;
        }

        return $remaining;
    }
}
