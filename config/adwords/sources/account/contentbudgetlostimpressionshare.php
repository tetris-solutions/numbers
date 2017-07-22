<?php
return [
    "metric" => "contentbudgetlostimpressionshare",
    "entity" => "Account",
    "fields" => [
        "ContentBudgetLostImpressionShare",
        "ContentRankLostImpressionShare",
        "ContentImpressionShare"
    ],
    "inferred_from" => [
        "contentimpressionshare",
        "impressions"
    ],
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        $parseValue = function ($str) {
            if (!is_string($str)) {
                return null;
            }
    
            $multiplier = 1;
    
            if (strpos($str, '%') !== FALSE) {
                $multiplier = 0.01;
            }
    
            $isSpecial = strpos($str, '>') !== FALSE || strpos($str, '<') !== FALSE;
    
            $clean = preg_replace("/[^0-9.-]/", "", $str);
    
            if (!is_numeric($clean)) {
                return ['value' => null, 'raw' => $str];
            }
    
            $estimate = floatval($clean) * $multiplier;
    
            return $isSpecial
                ? ['value' => $estimate, 'raw' => $str]
                : $estimate;
        };
    
        $value = $data->{'ContentBudgetLostImpressionShare'};
        $parsedValue = $parseValue($value);
    
        if (!is_array($parsedValue)) return $parsedValue;
    
        $props = explode(',', 'ContentRankLostImpressionShare,ContentImpressionShare');
    
        $remaining = 1;
    
        foreach ($props as $prop) {
            $aux = $parseValue($data->{$prop});
    
            if (!is_numeric($aux)) return $parsedValue;
    
            $remaining -= $aux;
        }
    
        return $remaining;
    },
    "sum" => function (array $rows) {
        $lostImpressionShareField = 'contentbudgetlostimpressionshare';
        $impressionShareField = 'contentimpressionshare';
        $impressionField = 'impressions';
    
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
    }
];
