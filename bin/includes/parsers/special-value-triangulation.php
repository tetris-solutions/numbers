<?php

return function ($data) {
    $parseValue = function ($str) {
        if (!is_string($str)) {
            return null;
        }

        $multiplier = 1;

        if (strpos($str, '%') !== FALSE) {
            $multiplier = 0.01;
        }

        $isSpecial = strpos($str, '>') !== FALSE || strpos($str, '<') !== FALSE;

        $clean = preg_replace("/[^0-9.-]/", "", $str);

        if (!is_numeric($clean)) {
            return ['value' => null, 'raw' => $str];
        }

        $estimate = floatval($clean) * $multiplier;

        return $isSpecial
            ? ['value' => $estimate, 'raw' => $str]
            : $estimate;
    };

    $value = $data->{PROPERTY0_NAME};
    $parsedValue = $parseValue($value);

    if (!is_array($parsedValue)) return $parsedValue;

    $props = explode(',', PROPERTY1_NAME);

    $remaining = 1;

    foreach ($props as $prop) {
        $aux = $parseValue($data->{$prop});

        if (!is_numeric($aux)) return $parsedValue;

        $remaining -= $aux;
    }

    return $remaining;
};
