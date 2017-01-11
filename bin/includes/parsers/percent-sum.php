<?php

return function (array $rows) {
    $dividendMetric = PROPERTY0_NAME;
    $divisorMetric = PROPERTY1_NAME;

    $sumDividend = 0;
    $sumDivisor = 0;

    foreach ($rows as $row) {
        $sumDividend += $row->{$dividendMetric};
        $sumDivisor += $row->{$divisorMetric};
    }

    return (float)$sumDivisor !== 0.0
        ? $sumDividend / $sumDivisor
        : 0;
};
