<?php

namespace Tetris\Numbers\Base\Parser;


use Tetris\Numbers\Report\Query\Query;

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

    function parse($source, Query $query)
    {
        $conv = floatval(str_replace(',', '', $source->{$this->dividendProperty}));
        $cost = floatval(str_replace(',', '', $source->{$this->divisorProperty}));

        return $cost === 0.0 ? 0.0 : $conv / $cost;
    }

    static function spec(string $dividend, string $divisor): array
    {
        $both = [$dividend, $divisor];

        return [
            'traits' => [
                'parser' => self::class
            ],
            'dividendProperty' => $dividend,
            'divisorProperty' => $divisor,
            'fields' => $both
        ];
    }
}