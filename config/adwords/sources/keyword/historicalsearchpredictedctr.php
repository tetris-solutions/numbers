<?php
return [
    "metric" => "historicalsearchpredictedctr",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "HistoricalSearchPredictedCtr"
    ],
    "parse" => function ($data) {
        return $data->{'HistoricalSearchPredictedCtr'};
    }
];
