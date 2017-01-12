<?php

return function (array $rows) {
    $impressionShareField = PROPERTY0_NAME;
    $impressionField = PROPERTY1_NAME;

    $totalPossibleImpressions = 0;
    $totalImpressions = 0;

    foreach ($rows as $row) {
        $totalImpressions += $row->{$impressionField};

        $impressionShare = $row->{$impressionShareField};

        if (!is_numeric($impressionShare)) return null;

        $possibleImpressions = $row->{$impressionField} / $impressionShare;

        $totalPossibleImpressions += $possibleImpressions;
    }

    return !$totalPossibleImpressions
        ? 0
        : $totalImpressions / $totalPossibleImpressions;
};
