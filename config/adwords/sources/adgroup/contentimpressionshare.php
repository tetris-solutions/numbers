<?php
return [
    "metric" => "contentimpressionshare",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ContentImpressionShare",
        "ContentRankLostImpressionShare"
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
    
        $value = $data->{'ContentImpressionShare'};
        $parsedValue = $parseValue($value);
    
        if (!is_array($parsedValue)) return $parsedValue;
    
        $props = explode(',', 'ContentRankLostImpressionShare');
    
        $remaining = 1;
    
        foreach ($props as $prop) {
            $aux = $parseValue($data->{$prop});
    
            if (!is_numeric($aux)) return $parsedValue;
    
            $remaining -= $aux;
        }
    
        return $remaining;
    },
    "inferred_from" => [
        "impressions"
    ],
    "sum" => function (array $rows) {
        $impressionShareField = 'contentimpressionshare';
        $impressionField = 'impressions';
    
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
    }
];
