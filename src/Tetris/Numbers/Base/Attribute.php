<?php

namespace Tetris\Numbers\Base;


abstract class Attribute
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
     * @var bool
     */
    public $is_filter;
    /**
     * @var string
     */
    public $type;
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
    /**
     * @var string
     */
    public $platform;
}