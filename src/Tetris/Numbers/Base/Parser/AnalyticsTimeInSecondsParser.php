<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait AnalyticsTimeInSecondsParser
{
    private static function pad(int $num)
    {
        return substr("0" . $num, -2);
    }

    private static function secondsToString(int $seconds): string
    {

        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $seconds = ($seconds % 3600) % 60;


        return self::pad($hours) . ':' .
            self::pad($minutes) . ':' .
            self::pad($seconds);
    }

    function parse($source, Query $queryBase)
    {
        $seconds = (int)$this->getValue($source);

        return self::secondsToString($seconds);
    }
}
