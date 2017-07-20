<?php

namespace Tetris\Numbers\Base;

use ArrayAccess;

abstract class Source implements ArrayAccess
{
    private $data = [];
    /**
     * @var string
     */
    public $metric;
    /**
     * @var string
     */
    public $entity;
    /**
     * @var string
     */
    public $platform;
    /**
     * @var array
     */
    public $fields;

    /**
     * @var array|null
     */
    public $inferred_from;

    function __isset($name)
    {
        return isset($this->{$name}) || isset($this->data[$name]);
    }

    function __get($name)
    {
        return property_exists($this, $name)
            ? $this->{$name} ?? null
            : $this->data[$name] ?? null;
    }

    function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->{$name} = $value;
        } else {
            $this->data[$name] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return $this->__isset($offset);
    }

    public function offsetGet($offset)
    {
        return $this->__get($offset);
    }

    public function offsetSet($offset, $value)
    {
        return $this->__set($offset, $value);
    }

    public function offsetUnset($offset)
    {
        $this->{$offset} = null;
    }
}
