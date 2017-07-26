<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait FacebookDayOfWeekParser
{
    function parse($source, Query $queryBase)
    {
        return date('l', strtotime($this->getValue($source)));
    }
}
