<?php
return [
    "metric" => "searchimpressionshare",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "SearchImpressionShare"
    ],
    "parse" => function ($data): array {
        $value = $data->{'SearchImpressionShare'};
    
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
        $impressionShareField = 'searchimpressionshare';
        $impressionField = 'impressions';
    
        $totalPossibleImpressions = 0;
        $totalImpressions = 0;
    
        $getPossibleImpressions = function ($impressionShare, $impressions) {
            $invalidImpressionShare = (
                !isset($impressionShare['raw']) ||
                !is_float($impressionShare['value']) ||
                !is_string($impressionShare['raw']) ||
                strpos($impressionShare['raw'], '<') !== FALSE ||
                strpos($impressionShare['raw'], '>') !== FALSE
            );
    
            if ($invalidImpressionShare) {
                return null;
            }
    
            return $impressions / $impressionShare['value'];
        };
    
        foreach ($rows as $row) {
            $totalImpressions += $row->{$impressionField};
    
            $possibleImpressions = $getPossibleImpressions($row->{$impressionShareField}, $row->{$impressionField});
    
            if ($possibleImpressions === null) return null;
    
            $totalPossibleImpressions += $possibleImpressions;
        }
    
        return $totalPossibleImpressions === 0.0
            ? null
            : $totalImpressions / $totalPossibleImpressions;
    }
];
