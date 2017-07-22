<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Placement",
    "fields" => [
        "ActiveViewCpm"
    ],
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewCpm'}));
    }
];
