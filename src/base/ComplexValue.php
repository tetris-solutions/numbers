<?php

namespace Tetris\Numbers;

use ArrayAccess;

class ComplexValue implements ArrayAccess
{
    public $value;
    public $raw;

    function __construct($value, $raw)
    {
        $this->value = $value;
        $this->raw = $raw;
    }

    public function offsetExists($offset)
    {
        return isset($this->{$offset});
    }

    public function offsetGet($offset)
    {
        return $this->{$offset} ?? null;
    }

    public function offsetSet($offset, $value)
    {
        $this->{$offset} = $value;
    }

    public function offsetUnset($offset)
    {
        $this->{$offset} = null;
    }
}