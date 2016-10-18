<?php
return [
    "metric" => "cpmsignificance",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "CpmSignificance"
    ],
    "parse" => function ($data) {
        return $data->CpmSignificance;
    }
];
