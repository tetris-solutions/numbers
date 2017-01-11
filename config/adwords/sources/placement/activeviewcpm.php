<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Placement",
    "platform" => "adwords",
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCpm"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'ActiveViewCpm'});
    }
];
