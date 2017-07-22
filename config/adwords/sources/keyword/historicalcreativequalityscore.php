<?php
return [
    "metric" => "historicalcreativequalityscore",
    "entity" => "Keyword",
    "fields" => [
        "HistoricalCreativeQualityScore"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        return $data->{'HistoricalCreativeQualityScore'};
    }
];
