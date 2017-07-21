<?php

namespace Tetris\Numbers\Base;

use ArrayAccess;
use Tetris\Numbers\Utils\GenericArray;

class ComplexValue implements ArrayAccess
{
    use GenericArray;

    public $value;
    public $raw;

    function __construct($value, $raw)
    {
        $this->value = $value;
        $this->raw = $raw;
    }
}