<?php

namespace Tetris\Numbers\Base;

abstract class Attribute extends Field
{
    /**
     * @var bool
     */
    public $is_filter = false;
    /**
     * @var bool
     */
    public $is_metric;
    /**
     * @var bool
     */
    public $is_dimension;
    /**
     * @var bool
     */
    public $is_percentage = false;
    /**
     * @var array|null
     */
    public $values;
    /**
     * @var array|null
     */
    public $incompatible;

    /**
     * @var string|null
     */
    public $property_name;
}
