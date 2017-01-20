<?php

return function (array $rows) {
    $costMetric = PROPERTY0_NAME;
    $v100Metric = PROPERTY1_NAME;
    $viewsMetric = PROPERTY2_NAME;

    $totalCost = 0;
    $totalFullViews = 0;

    foreach ($rows as $row) {
        $totalCost += $row->{$costMetric};

        $fullViewPercent = $row->{$v100Metric};
        $allViews = $row->{$viewsMetric};

        $totalFullViews += $allViews * $fullViewPercent;
    }


    return $totalFullViews === 0.0 ? 0 : $totalCost / $totalFullViews;
};
