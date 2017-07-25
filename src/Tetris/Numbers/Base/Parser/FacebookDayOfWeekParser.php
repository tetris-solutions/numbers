<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\QueryBase;

trait FacebookDayOfWeekParser
{
    function parse($source, QueryBase $queryBase)
    {
        return date('l', strtotime($this->getValue($source)));
    }
}
