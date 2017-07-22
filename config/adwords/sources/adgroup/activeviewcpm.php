<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "AdGroup",
    "fields" => [
        "ActiveViewCpm"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewCpm'}));
    }
];
