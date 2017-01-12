<?php
return [
    "metric" => "contentimpressionshare",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ContentImpressionShare"
    ],
    "parse" => function ($data): array {
        $value = $data->{'ContentImpressionShare'};
    
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
        "impressions"
    ],
    "sum" => function (array $rows) {
        $impressionShareField = 'contentimpressionshare';
        $impressionField = 'impressions';
    
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
    }
];
