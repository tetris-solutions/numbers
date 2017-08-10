<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait DateTimeParser
{
    function parse($source, Query $queryBase)
    {
        return date('Y-m-d H:i:s', strtotime($this->getValue($source)));
    }
}