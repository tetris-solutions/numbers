<?php

return function (array $rows) {
    $impressionShareField = PROPERTY0_NAME;
    $impressionField = PROPERTY1_NAME;

    $totalPossibleImpressions = 0;
    $totalImpressions = 0;

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
        $totalImpressions += $row->{$impressionField};

        $impressionShare = $getSpecialValue($row->{$impressionShareField});

        if (!$impressionShare) return null;

        $possibleImpressions = $row->{$impressionField} / $impressionShare;

        $totalPossibleImpressions += $possibleImpressions;
    }

    return !$totalPossibleImpressions
        ? 0
        : $totalImpressions / $totalPossibleImpressions;
};
