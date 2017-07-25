<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\QueryBase;

trait FacebookYearParser
{
    function parse($source, QueryBase $queryBase)
    {
        return date('Y', strtotime($this->getValue($source)));
    }
}
