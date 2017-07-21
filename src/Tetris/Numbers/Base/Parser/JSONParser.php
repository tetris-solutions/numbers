<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Query;

trait JSONParser
{
    function parse($source, Query $query)
    {
        return json_decode($this->getValue($source));
    }
}
