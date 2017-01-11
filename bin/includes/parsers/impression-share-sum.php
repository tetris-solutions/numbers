<?php

return function (array $rows) {
    $impressionShareField = PROPERTY0_NAME;
    $impressionField = PROPERTY1_NAME;

    $totalPossibleImpressions = 0;
    $totalImpressions = 0;

    $getPossibleImpressions = function ($impressionShare, $impressions) {
        $invalidImpressionShare = (
            !isset($impressionShare['raw']) ||
            !is_float($impressionShare['value']) ||
            !is_string($impressionShare['raw']) ||
            strpos($impressionShare['raw'], '<') !== FALSE ||
            strpos($impressionShare['raw'], '>') !== FALSE
        );

        if ($invalidImpressionShare) {
            return null;
        }

        return $impressions / $impressionShare['value'];
    };

    foreach ($rows as $row) {
        $totalImpressions += $row->{$impressionField};

        $possibleImpressions = $getPossibleImpressions($row->{$impressionShareField}, $row->{$impressionField});

        if ($possibleImpressions === null) return null;

        $totalPossibleImpressions += $possibleImpressions;
    }

    return $totalPossibleImpressions === 0.0
        ? null
        : $totalImpressions / $totalPossibleImpressions;
};
