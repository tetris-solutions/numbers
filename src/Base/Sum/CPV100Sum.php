<?php

namespace Tetris\Numbers\Base\Sum;

use Tetris\Numbers\Base\Field;

trait CPV100Sum
{
    use Field;
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
}
