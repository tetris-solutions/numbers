<?php
return [
    "metric" => "searchimpressionshare",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "SearchImpressionShare",
        "SearchBudgetLostImpressionShare",
        "SearchRankLostImpressionShare"
    ],
    "parse" => function ($data) {
        $value = $data->{'SearchImpressionShare'};
        $part1 = $data->{'SearchBudgetLostImpressionShare'};
        $part2 = $data->{'SearchRankLostImpressionShare'};
    
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
    
        $a = $parseValue($value);
    
        if (!is_array($a)) {
            return $a;
        }
    
        $b = $parseValue($part1);
        $c = $parseValue($part2);
    
        if (is_array($b) || is_array($c)) {
            return $a;
        }
    
        return 1 - ($b + $c);
    },
    "inferred_from" => [
        "impressions"
    ],
    "sum" => function (array $rows) {
        $impressionShareField = 'searchimpressionshare';
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
