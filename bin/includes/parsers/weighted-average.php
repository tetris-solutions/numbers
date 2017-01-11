<?php

return function (array $rows) {
    $metric = PROPERTY0_NAME;
    $weight = PROPERTY1_NAME;

    $sumDividend = 0;
    $sumDivisor = 0;

    foreach ($rows as $row) {
        $sumDividend += $row->{$metric} * $row->{$weight};
        $sumDivisor += $row->{$weight};
    }

    return (float)$sumDivisor !== 0.0
        ? $sumDividend / $sumDivisor
        : 0;
};