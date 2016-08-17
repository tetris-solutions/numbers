<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCpm"
    ],
    "parse" => function ($data): float {
        return (float)$data->ActiveViewCpm;
    },
    "sum" => NULL
];
