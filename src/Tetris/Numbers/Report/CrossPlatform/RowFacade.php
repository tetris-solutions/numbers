<?php

namespace Tetris\Numbers\Report\CrossPlatform;

use stdClass;

class RowFacade
{
    private $finder;
    public $__source__;

    function __construct(callable $findAttribute, stdClass $source)
    {
        $this->__source__ = $source;
        $this->finder = $findAttribute;
    }

    function __isset($name)
    {
        return call_user_func($this->finder, $name) !== NULL;
    }

    function __get($name)
    {
        return call_user_func($this->finder, $name);
    }
}