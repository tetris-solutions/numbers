<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\QueryBase;

trait IntegerParser
{
    function parse($source, QueryBase $query): int
    {
        return intval($this->getNumericValue($source));
    }
}
