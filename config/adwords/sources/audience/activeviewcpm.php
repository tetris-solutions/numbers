<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCpm"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewCpm'}));
    }
];
