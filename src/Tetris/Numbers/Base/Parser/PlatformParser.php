<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait PlatformParser
{
    function parse($source, Query $query): string
    {
        return $query->platform;
    }
}
