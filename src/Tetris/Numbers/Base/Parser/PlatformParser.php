<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\QueryBase;

trait PlatformParser
{
    function parse($source, QueryBase $query): string
    {
        return $query->platform;
    }
}
