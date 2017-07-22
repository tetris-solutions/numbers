<?php
return [
    "metric" => "historicallandingpagequalityscore",
    "entity" => "Keyword",
    "fields" => [
        "HistoricalLandingPageQualityScore"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        return $data->{'HistoricalLandingPageQualityScore'};
    }
];
