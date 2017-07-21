<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\QueryBase;

trait PercentParser
{
    function parse($source, QueryBase $query): float
    {
        return floatval($this->getNumericValue($source)) / 100;
    }
}
