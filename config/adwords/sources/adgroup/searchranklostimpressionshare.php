<?php
return [
    "metric" => "searchranklostimpressionshare",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "SearchRankLostImpressionShare"
    ],
    "parse" => function ($data): array {
        $value = $data->{'SearchRankLostImpressionShare'};
    
        if (!is_string($value)) {
            return [
                'value' => null,
                'raw' => $value
            ];
        }
    
        $multiplier = 1;
    
        if (strpos($value, '%') !== FALSE) {
            $multiplier = 0.01;
        }
    
        $clean = preg_replace("/[^0-9,.]/", "", $value);
    
        return [
            'value' => is_numeric($clean)
                ? floatval($clean) * $multiplier
                : null,
            'raw' => $value
        ];
    },
    "inferred_from" => [
        "searchimpressionshare",
        "impressions"
    ],
    "sum" => function (array $rows) {
        $lostImpressionShareField = 'searchranklostimpressionshare';
        $impressionShareField = 'searchimpressionshare';
        $impressionField = 'impressions';
    
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
    }
];
