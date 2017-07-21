<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait IntegerParser
{
    function parse($source, Query $query): int
    {
        return intval($this->getNumericValue($source));
    }
}
