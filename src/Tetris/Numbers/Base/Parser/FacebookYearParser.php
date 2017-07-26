<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait FacebookYearParser
{
    function parse($source, Query $queryBase)
    {
        return date('Y', strtotime($this->getValue($source)));
    }
}
