<?php
return [
    "metric" => "averageposition",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "AveragePosition"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AveragePosition'}));
    },
    "inferred_from" => [
        "impressions"
    ],
    "sum" => function (array $rows) {
        $metric = 'averageposition';
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
