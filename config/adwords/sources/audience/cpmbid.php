<?php
return [
    "metric" => "cpmbid",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "CpmBid"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'CpmBid'});
    }
];
