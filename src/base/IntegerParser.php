<?php

namespace Tetris\Numbers;


trait IntegerParser
{
    use Field;

    function parse($source, Query $query): int
    {
        return intval($this->getNumericValue($source));
    }
}
