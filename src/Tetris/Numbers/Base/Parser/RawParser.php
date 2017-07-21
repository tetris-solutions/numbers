<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait RawParser
{
    function parse($source, Query $query)
    {
        return $this->getValue($source);
    }
}
