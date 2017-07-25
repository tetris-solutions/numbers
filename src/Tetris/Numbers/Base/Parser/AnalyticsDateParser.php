<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\QueryBase;

trait AnalyticsDateParser
{
    function parse($source, QueryBase $queryBase)
    {
        return date('Y-m-d', strtotime($this->getValue($source)));
    }
}