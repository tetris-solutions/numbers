<?php

namespace Tetris\Numbers\Utils;


class ArrayUtils
{
    static function uniq(array $s): array
    {
        return array_values(array_unique($s));
    }

    static function omit(array $array, ...$keys): array
    {
        foreach ($keys as $key) {
            if (array_key_exists($key, $array)) {
                unset($array[$key]);
            }
        }

        return $array;
    }

    static function flatten(array $array, $maxItems = INF): array
    {
        $parsed = [];

        foreach ($array as $key => $value) {
            if (is_array($value) || is_object($value)) {
                $value = (array)$value;
                $size = count($value);

                if ($size > $maxItems) {
                    $parsed[$key] = "[ {$size} values ]";
                    continue;
                }

                $subArray = self::flatten($value, $maxItems);

                foreach ($subArray as $subKey => $subValue) {
                    $parsed["{$key}_{$subKey}"] = $subValue;
                }
            } else {
                $parsed[$key] = is_string($value) ? $value : (string)$value;
            }
        }

        return $parsed;
    }

}