<?php
return [
    "metric" => "cpmbid",
    "entity" => "AdGroup",
    "fields" => [
        "CpmBid"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'CpmBid'}));
    }
];
