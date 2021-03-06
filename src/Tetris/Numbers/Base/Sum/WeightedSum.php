<?php

namespace Tetris\Numbers\Base\Sum;

trait WeightedSum
{
    /**
     * @var string
     */
    public $weightMetric;

    function sum(array $rows)
    {
        $sumDividend = 0;
        $sumDivisor = 0;

        foreach ($rows as $row) {
            $sumDividend += $row->{$this->id} * $row->{$this->weightMetric};
            $sumDivisor += $row->{$this->weightMetric};
        }

        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    }

    static function sumSpec(string $weight): array
    {
        return [
            'traits' => [
                'sum' => self::class
            ],
            'weightMetric' => $weight,
            "inferred_from" => [$weight]
        ];
    }
}
