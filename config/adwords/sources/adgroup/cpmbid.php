<?php
return [
    "metric" => "cpmbid",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "CpmBid"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'CpmBid'}));
    }
];
