<?php

namespace Tetris\Numbers\Generator;

use Tetris\Numbers\Base\Attribute;

class TransientAttribute extends Attribute
{
    use Transient;
    use LegacyTransient;

    function asArray(): array
    {
        $array = [];

        foreach (get_object_vars($this) as $key => $value) {
            $isLegacyAttribute = $key !== 'platform' && (
                    property_exists(Attribute::class, $key) ||
                    property_exists(LegacyTransient::class, $key)
                );

            if ($isLegacyAttribute && isset($value)) {
                $array[$key] = $value;
            }
        }

        return $array;
    }
}