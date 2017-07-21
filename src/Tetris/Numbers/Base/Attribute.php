<?php

namespace Tetris\Numbers\Base;

abstract class Attribute extends Field
{
    /**
     * @var bool
     */
    public $is_filter;
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
    public $is_percentage;
    /**
     * @var array|null
     */
    public $values;
    /**
     * @var array|null
     */
    public $incompatible;
}