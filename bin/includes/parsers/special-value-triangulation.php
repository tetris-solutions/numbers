<?php

return function ($data) {
    $value = $data->{PROPERTY0_NAME};
    $part1 = $data->{PROPERTY1_NAME};
    $part2 = $data->{PROPERTY2_NAME};

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

    $a = $parseValue($value);

    if (!is_array($a)) {
        return $a;
    }

    $b = $parseValue($part1);
    $c = $parseValue($part2);

    if (is_array($b) || is_array($c)) {
        return $a;
    }

    return 1 - ($b + $c);
};
