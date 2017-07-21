<?php

namespace Tetris\Numbers\Base;

trait Field
{
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

    function getValue($source)
    {
        return $source->{$this->property} ?? null;
    }

    function getNumericValue($source): string
    {
        return str_replace(['%', ','], '', $this->getValue($source));
    }
}
