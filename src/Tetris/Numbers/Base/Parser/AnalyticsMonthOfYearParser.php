<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait AnalyticsMonthOfYearParser
{
    function parse($source, Query $queryBase)
    {
        return date('F', strtotime('2000-' . $this->getValue($source) . '-01'));
    }
}