<?php
return [
    "metric" => "averagequalityscore",
    "entity" => "Keyword",
    "fields" => [
        "QualityScore"
    ],
    "inferred_from" => [
        "impressions"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'QualityScore'}));
    },
    "sum" => function (array $rows) {
        $metric = 'averagequalityscore';
        $weight = 'impressions';
    
        $sumDividend = 0;
        $sumDivisor = 0;
    
        foreach ($rows as $row) {
            $sumDividend += $row->{$metric} * $row->{$weight};
            $sumDivisor += $row->{$weight};
        }
    
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
