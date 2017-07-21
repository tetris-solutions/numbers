<?php

namespace Tetris\Numbers\Utils;

trait GenericArray
{
    function offsetExists($offset)
    {
        return isset($this->{$offset});
    }

    function offsetGet($offset)
    {
        return $this->{$offset} ?? null;
    }

    function offsetSet($offset, $value)
    {
        $this->{$offset} = $value;
    }

    function offsetUnset($offset)
    {
        $this->{$offset} = null;
    }
}