<?php
return [
    "metric" => "cpmbid",
    "entity" => "Audience",
    "fields" => [
        "CpmBid"
    ],
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'CpmBid'}));
    }
];
