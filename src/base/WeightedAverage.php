<?php

namespace Tetris\Numbers;


trait WeightedAverage
{
    use Field;
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
}
