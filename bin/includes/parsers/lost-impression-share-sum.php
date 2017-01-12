<?php

return function (array $rows) {
    $lostImpressionShareField = PROPERTY0_NAME;
    $impressionShareField = PROPERTY1_NAME;
    $impressionField = PROPERTY2_NAME;

    $totalPossibleImpressions = 0;
    $totalLostImpressions = 0;

    foreach ($rows as $row) {
        $impressionShare = $row->{$impressionShareField};
        $lostShare = $row->{$lostImpressionShareField};

        if (!is_numeric($impressionShare) || !is_numeric($lostShare)) {
            return null;
        }

        $possibleImpressions = $row->{$impressionField} / $impressionShare;

        $totalPossibleImpressions += $possibleImpressions;
        $totalLostImpressions += $possibleImpressions * $lostShare;
    }

    return !$totalPossibleImpressions
        ? 0
        : $totalLostImpressions / $totalPossibleImpressions;
};