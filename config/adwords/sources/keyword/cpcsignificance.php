<?php
return [
    "metric" => "cpcsignificance",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "CpcSignificance"
    ],
    "parse" => function ($data) {
        return $data->CpcSignificance;
    }
];
