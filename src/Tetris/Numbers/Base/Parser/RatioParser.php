<?php

namespace Tetris\Numbers\Base\Parser;


use Tetris\Numbers\Report\Query\QueryBase;

trait RatioParser
{
    /**
     * @var string
     */
    public $dividendProperty;
    /**
     * @var string
     */
    public $divisorProperty;

    function parse($source, QueryBase $query)
    {
        $conv = floatval(str_replace(',', '', $source->{$this->dividendProperty}));
        $cost = floatval(str_replace(',', '', $source->{$this->divisorProperty}));

        return $cost === 0.0 ? 0.0 : $conv / $cost;
    }
}