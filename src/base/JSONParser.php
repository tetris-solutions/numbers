<?php

namespace Tetris\Numbers;


trait JSONParser
{
    use Field;

    function parse($source, Query $query)
    {
        return json_decode($this->getValue($source));
    }
}
