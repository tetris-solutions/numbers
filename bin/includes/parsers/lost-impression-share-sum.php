<?php

return function (array $rows) {
    $lostImpressionShareField = PROPERTY0_NAME;
    $impressionShareField = PROPERTY1_NAME;
    $impressionField = PROPERTY2_NAME;

    $totalPossibleImpressions = 0;
    $totalLostImpressions = 0;

    $getSpecialValue = function ($specialValue) {
        $isInvalid = (
            !isset($specialValue['raw']) ||
            !is_float($specialValue['value']) ||
            !is_string($specialValue['raw']) ||
            strpos($specialValue['raw'], '<') !== FALSE ||
            strpos($specialValue['raw'], '>') !== FALSE
        );

        return $isInvalid ? null : $specialValue['value'];
    };

    foreach ($rows as $row) {
        $impressionShare = $getSpecialValue($row->{$impressionShareField});
        $lostShare = $getSpecialValue($row->{$lostImpressionShareField});

        if (!$impressionShare || $lostShare === null) {
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