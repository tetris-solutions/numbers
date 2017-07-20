<?php

namespace Tetris\Numbers;


trait FloatParser
{
    use Field;

    function parse($source, Query $query): float
    {
        return floatval($this->getNumericValue($source));
    }
}
