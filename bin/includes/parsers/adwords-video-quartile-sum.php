<?php

return function (array $rows) {
    $quartileViewMetric = PROPERTY0_NAME;
    $totalViewsMetric = PROPERTY1_NAME;

    $totalViews = 0;
    $partialViews = 0;

    foreach ($rows as $row) {
        $totalViews += $row->{$totalViewsMetric};
        $partialViews += $row->{$totalViewsMetric} * $row->{$quartileViewMetric};
    }

    return (float)$totalViews !== 0.0
        ? $partialViews / $totalViews
        : 0;
};
