<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Audience",
    "fields" => [
        "ActiveViewCpm"
    ],
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewCpm'}));
    }
];
