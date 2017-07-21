<?php

namespace Tetris\Numbers\Generator;

use ArrayAccess;
use Tetris\Numbers\Base\Attribute;

class TransientAttribute extends Attribute implements ArrayAccess
{
    use Transient;
    use LegacyTransient;

    function asArray(): array
    {
        $array = [];

        foreach (get_object_vars($this) as $key => $value) {
            $isLegacyAttribute = (
                property_exists(Attribute::class, $key) ||
                property_exists(LegacyTransient::class, $key)
            );

            if ($isLegacyAttribute && isset($value)) {
                $array[$key] = $value;
            }
        }

        return $array;
    }

    function offsetExists($offset)
    {
        return isset($this->{$offset});
    }

    function offsetGet($offset)
    {
        return $this->{$offset} ?? null;
    }

    function offsetSet($offset, $value)
    {
        $this->{$offset} = $value;
    }

    function offsetUnset($offset)
    {
        $this->{$offset} = null;
    }
}