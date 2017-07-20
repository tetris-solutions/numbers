<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Base\Field;
use Tetris\Numbers\Query;

trait RawParser
{
    use Field;

    function parse($source, Query $query)
    {
        return $this->getValue($source);
    }
}
