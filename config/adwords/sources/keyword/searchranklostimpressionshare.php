<?php
return [
    "metric" => "searchranklostimpressionshare",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "SearchRankLostImpressionShare",
        "SearchImpressionShare"
    ],
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
    
        $value = $data->{'SearchRankLostImpressionShare'};
        $parsedValue = $parseValue($value);
    
        if (!is_array($parsedValue)) return $parsedValue;
    
        $props = explode(',', 'SearchImpressionShare');
    
        $remaining = 1;
    
        foreach ($props as $prop) {
            $aux = $parseValue($data->{$prop});
    
            if (!is_numeric($aux)) return $parsedValue;
    
            $remaining -= $aux;
        }
    
        return $remaining;
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
