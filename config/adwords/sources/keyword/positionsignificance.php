<?php
return [
    "metric" => "positionsignificance",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "PositionSignificance"
    ],
    "parse" => function ($data) {
        return $data->PositionSignificance;
    }
];
