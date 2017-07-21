<?php

namespace Tetris\Numbers\Base;

use Tetris\Numbers\Utils\GenericArrayAccess;
use ArrayAccess;

abstract class Field implements ArrayAccess
{
    use GenericArrayAccess;

    /**
     * @var string
     */
    public $id;
    /**
     * @var string
     */
    public $property;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $platform;

    protected function getValue($source)
    {
        return $source->{$this->property} ?? null;
    }

    protected function getNumericValue($source): string
    {
        return str_replace(['%', ','], '', $this->getValue($source));
    }
}
