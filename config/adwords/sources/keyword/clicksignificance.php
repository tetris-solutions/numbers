<?php
return [
    "metric" => "clicksignificance",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ClickSignificance"
    ],
    "parse" => function ($data) {
        return $data->ClickSignificance;
    }
];
