<?php

namespace Tetris\Numbers\Base;

use ArrayAccess;
use Tetris\Numbers\Utils\GenericArrayAccess;

class ComplexValue implements ArrayAccess
{
    use GenericArrayAccess;

    public $value;
    public $raw;

    function __construct($value, $raw)
    {
        $this->value = $value;
        $this->raw = $raw;
    }
}