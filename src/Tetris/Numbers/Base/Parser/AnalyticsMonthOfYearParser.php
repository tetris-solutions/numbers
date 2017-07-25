<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\QueryBase;

trait AnalyticsMonthOfYearParser
{
    function parse($source, QueryBase $queryBase)
    {
        return date('F', strtotime('2000-' . $this->getValue($source) . '-01'));
    }
}