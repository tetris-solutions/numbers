<?php
return [
    "metric" => "costsignificance",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "CostSignificance"
    ],
    "parse" => function ($data) {
        return $data->CostSignificance;
    }
];
