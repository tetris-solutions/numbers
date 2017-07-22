<?php
return [
    "metric" => "historicalsearchpredictedctr",
    "entity" => "Keyword",
    "fields" => [
        "HistoricalSearchPredictedCtr"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        return $data->{'HistoricalSearchPredictedCtr'};
    }
];
