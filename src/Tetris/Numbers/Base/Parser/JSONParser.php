<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\QueryBase;

trait JSONParser
{
    function parse($source, QueryBase $query)
    {
        return json_decode($this->getValue($source));
    }
}
