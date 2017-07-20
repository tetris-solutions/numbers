<?php

namespace tetris\Numbers\Base\Parser;

use Tetris\Numbers\Base\Field;
use Tetris\Numbers\Query;

trait PercentParser
{
    use Field;

    function parse($source, Query $query): float
    {
        return floatval($this->getNumericValue($source)) / 100;
    }
}
