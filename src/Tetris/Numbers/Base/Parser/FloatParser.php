<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait FloatParser
{
    function parse($source, Query $query): float
    {
        return floatval($this->getNumericValue($source));
    }
}
