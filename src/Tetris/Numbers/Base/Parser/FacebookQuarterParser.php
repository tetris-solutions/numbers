<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait FacebookQuarterParser
{
    function parse($source, Query $queryBase)
    {
        $time = strtotime($this->getValue($source));
        $year = date('Y', $time);
        $month = date('n', $time);

        switch ((int)$month) {
            case 1:
            case 2:
            case 3:
                return "{$year}-01-01";
            case 4:
            case 5:
            case 6:
                return "{$year}-04-01";
            case 7:
            case 8:
            case 9:
                return "{$year}-07-01";
            case 10:
            case 11:
            case 12:
                return "{$year}-10-01";
            default:
                throw new \Exception("Invalid date: {$this->getValue($source)}", 500);
        }
    }
}
