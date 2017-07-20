<?php

namespace Tetris\Numbers;


trait PercentParser
{
    use Field;

    function parse($source, Query $query): float
    {
        return floatval($this->getNumericValue($source)) / 100;
    }
}
