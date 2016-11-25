<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCpm"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ActiveViewCpm);
    }
];
