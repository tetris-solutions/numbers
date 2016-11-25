<?php
return [
    "metric" => "cpmbid",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "CpmBid"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->CpmBid);
    }
];
