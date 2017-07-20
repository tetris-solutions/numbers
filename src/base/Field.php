<?php

namespace Tetris\Numbers;

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

    function getValue($source)
    {
        return $source->{$property} ?? null;
    }

    function getNumericValue($source): string
    {
        return str_replace(['%', ','], '', $this->getValue($source));
    }
}
