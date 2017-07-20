<?php

namespace tetris\Numbers\Base\Parser;

use Tetris\Numbers\Base\Field;
use Tetris\Numbers\Query;

trait JSONParser
{
    use Field;

    function parse($source, Query $query)
    {
        return json_decode($this->getValue($source));
    }
}
