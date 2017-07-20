<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Base\Field;
use Tetris\Numbers\Query;

trait FloatParser
{
    use Field;

    function parse($source, Query $query): float
    {
        return floatval($this->getNumericValue($source));
    }
}
