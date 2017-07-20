<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Base\Field;
use Tetris\Numbers\Query;

trait IntegerParser
{
    use Field;

    function parse($source, Query $query): int
    {
        return intval($this->getNumericValue($source));
    }
}
