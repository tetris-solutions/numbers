<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Base\ComplexValue;
use Tetris\Numbers\Report\Query\QueryBase;

trait ComplexValueParser
{
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
     * @param QueryBase $query
     * @return float|null|ComplexValue
     */
    function parse($source, QueryBase $query)
    {
        return $this->transform($this->getValue($source));
    }
}
