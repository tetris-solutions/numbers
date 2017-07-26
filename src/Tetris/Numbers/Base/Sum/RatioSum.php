<?php

namespace Tetris\Numbers\Base\Sum;

trait RatioSum
{
    /**
     * @var string
     */
    public $dividendMetric;
    /**
     * @var string
     */
    public $divisorMetric;

    function sum(array $rows)
    {
        $sumDividend = 0;
        $sumDivisor = 0;

        foreach ($rows as $row) {
            $sumDividend += $row->{$this->dividendMetric};
            $sumDivisor += $row->{$this->divisorMetric};
        }

        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    }

    static function sumSpec(string $dividendMetric, string $divisorMetric): array
    {
        return [
            'traits' => [
                'sum' => self::class
            ],
            'dividendMetric' => $dividendMetric,
            'divisorMetric' => $divisorMetric,
            "inferred_from" => [$dividendMetric, $divisorMetric]
        ];
    }
}
