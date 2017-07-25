<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\QueryBase;

trait FacebookWeekParser
{
    function parse($source, QueryBase $queryBase)
    {
        $time = strtotime($this->getValue($source));
        $weekDay = date('N', $time) - 1;

        $firstMomentOfWeek = $time - (24 * 60 * 60 * $weekDay);

        return date('Y-m-d', $firstMomentOfWeek);
    }
}
