<?php
return [
    "metric" => "historicallandingpagequalityscore",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "HistoricalLandingPageQualityScore"
    ],
    "parse" => function ($data) {
        return $data->{'HistoricalLandingPageQualityScore'};
    }
];
