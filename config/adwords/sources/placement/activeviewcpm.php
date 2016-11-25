<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Placement",
    "platform" => "adwords",
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCpm"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ActiveViewCpm);
    }
];
