<?php
return [
    "metric" => "searchbudgetlostimpressionshare",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "SearchBudgetLostImpressionShare",
        "SearchRankLostImpressionShare",
        "SearchImpressionShare"
    ],
    "parse" => function ($data) {
        $value = $data->{'SearchBudgetLostImpressionShare'};
        $part1 = $data->{'SearchRankLostImpressionShare'};
        $part2 = $data->{'SearchImpressionShare'};
    
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
        "searchimpressionshare",
        "impressions"
    ],
    "sum" => function (array $rows) {
        $lostImpressionShareField = 'searchbudgetlostimpressionshare';
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
