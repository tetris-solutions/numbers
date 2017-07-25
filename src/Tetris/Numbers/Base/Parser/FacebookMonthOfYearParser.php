<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\QueryBase;

trait FacebookMonthOfYearParser
{
    function parse($source, QueryBase $queryBase)
    {
        return date('F', strtotime($this->getValue($source)));
    }
}
