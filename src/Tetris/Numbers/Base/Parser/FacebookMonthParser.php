<?php

namespace Tetris\Numbers\Base\Parser;


use Tetris\Numbers\Report\Query\Query;

Trait FacebookMonthParser
{
    function parse($source, Query $queryBase)
    {
        return date('Y-m', strtotime($this->getValue($source))) . '-01';
    }
}