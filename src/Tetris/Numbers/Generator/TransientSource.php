<?php

namespace Tetris\Numbers\Generator;

use Tetris\Numbers\Base\Source;

class TransientSource extends Source
{
    use Transient;
    use LegacyTransient;

    function asArray(): array
    {
        $array = [];

        foreach (get_object_vars($this) as $key => $value) {
            $isLegacyAttribute = (
                property_exists(Source::class, $key) ||
                property_exists(LegacyTransient::class, $key)
            );

            if ($isLegacyAttribute && isset($value)) {
                $array[$key] = $value;
            }
        }

        return $array;
    }
}