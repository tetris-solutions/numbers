<?php
return [
    "metric" => "historicalcreativequalityscore",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "HistoricalCreativeQualityScore"
    ],
    "parse" => function ($data) {
        return $data->{'HistoricalCreativeQualityScore'};
    }
];
