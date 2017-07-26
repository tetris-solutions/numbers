<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait AnalyticsDateParser
{
    function parse($source, Query $queryBase)
    {
        return date('Y-m-d', strtotime($this->getValue($source)));
    }
}