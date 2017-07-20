<?php

namespace tetris\Numbers\Base\Parser;

use Tetris\Numbers\Base\Field;
use Tetris\Numbers\Base\ComplexValue;
use Tetris\Numbers\Query;

trait ComplexValueParser
{
    use Field;

    /**
     * @param $str
     * @return float|null|ComplexValue
     */
    function transform($str)
    {
        if (!is_string($str)) {
            return null;
        }

        $multiplier = 1;

        if (strpos($str, '%') !== FALSE) {
            $multiplier = 0.01;
        }

        $isComplex = strpos($str, '>') !== FALSE || strpos($str, '<') !== FALSE;

        $clean = preg_replace("/[^0-9.-]/", "", $str);

        if (!is_numeric($clean)) {
            return new ComplexValue(null, $str);
        }

        $estimate = floatval($clean) * $multiplier;

        return $isComplex
            ? new ComplexValue($estimate, $str)
            : $estimate;
    }

    /**
     * @param $source
     * @param Query $query
     * @return float|null|ComplexValue
     */
    function parse($source, Query $query)
    {
        return $this->transform($this->getValue($source));
    }
}
