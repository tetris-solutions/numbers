<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;
use DateTime;

trait AnalyticsWeekParser
{
    function parse($source, Query $queryBase)
    {
        $date = new DateTime();
        $isoWeek = $this->getValue($source);

        $year = (int)substr($isoWeek, 0, 4);
        $week = (int)substr($isoWeek, 4);

        $date->setISODate($year, $week);

        return $date->format('Y-m-d');
    }
}
