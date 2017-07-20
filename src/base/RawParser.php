<?php

namespace Tetris\Numbers;


trait RawParser
{
    use Field;

    function parse($source, Query $query)
    {
        return $this->getValue($source);
    }
}
