<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait FacebookMonthOfYearParser
{
    function parse($source, Query $queryBase)
    {
        return date('F', strtotime($this->getValue($source)));
    }
}
