<?php
return [
    "metric" => "cpmbid",
    "entity" => "Keyword",
    "fields" => [
        "CpmBid"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'CpmBid'}));
    }
];
