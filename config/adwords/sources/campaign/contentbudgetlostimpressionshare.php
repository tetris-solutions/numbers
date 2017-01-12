<?php
return [
    "metric" => "contentbudgetlostimpressionshare",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ContentBudgetLostImpressionShare"
    ],
    "parse" => function ($data): array {
        $value = $data->{'ContentBudgetLostImpressionShare'};
    
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
        "contentimpressionshare",
        "impressions"
    ],
    "sum" => function (array $rows) {
        $lostImpressionShareField = 'contentbudgetlostimpressionshare';
        $impressionShareField = 'contentimpressionshare';
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
