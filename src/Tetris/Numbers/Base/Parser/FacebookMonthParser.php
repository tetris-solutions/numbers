<?php

namespace Tetris\Numbers\Base\Parser;


use Tetris\Numbers\Report\Query\QueryBase;

Trait FacebookMonthParser
{
    function parse($source, QueryBase $queryBase)
    {
        return date('Y-m', strtotime($this->getValue($source))) . '-01';
    }
}