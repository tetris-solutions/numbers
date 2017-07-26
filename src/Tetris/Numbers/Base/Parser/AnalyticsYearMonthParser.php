<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait AnalyticsYearMonthParser
{
    function parse($source, Query $queryBase)
    {
        return date('Y-m-d', strtotime($this->getValue($source) . '01'));
    }
}