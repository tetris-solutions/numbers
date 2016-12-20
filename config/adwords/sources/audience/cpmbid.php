<?php
return [
    "metric" => "cpmbid",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "CpmBid"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->CpmBid);
    }
];
