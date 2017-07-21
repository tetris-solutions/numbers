<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\QueryBase;

trait RawParser
{
    function parse($source, QueryBase $query)
    {
        return $this->getValue($source);
    }
}
