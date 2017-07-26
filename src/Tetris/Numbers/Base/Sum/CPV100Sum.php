<?php

namespace Tetris\Numbers\Base\Sum;

trait CPV100Sum
{
    public $costMetric;
    public $views100PercentileMetric;
    public $viewsMetric;

    function sum(array $rows)
    {
        $costMetric = $this->costMetric;
        $v100Metric = $this->views100PercentileMetric;
        $viewsMetric = $this->viewsMetric;

        $totalCost = 0;
        $totalFullViews = 0;

        foreach ($rows as $row) {
            $totalCost += $row->{$costMetric};

            $fullViewPercent = $row->{$v100Metric};
            $allViews = $row->{$viewsMetric};

            $totalFullViews += $allViews * $fullViewPercent;
        }


        return $totalFullViews === 0.0 ? 0 : $totalCost / $totalFullViews;
    }

    static function spec(string $cost, string $views100Percentile, string $views): array
    {
        return [
            'traits' => [
                'sum' => self::class
            ],
            'costMetric' => $cost,
            'views100PercentileMetric' => $views100Percentile,
            'viewsMetric' => $views,
            'inferred_from' => [$cost, $views100Percentile, $views]
        ];
    }
}
