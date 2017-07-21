<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\QueryBase;

trait FloatParser
{
    function parse($source, QueryBase $query): float
    {
        return floatval($this->getNumericValue($source));
    }
}
