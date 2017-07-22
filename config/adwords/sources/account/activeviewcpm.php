<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Account",
    "fields" => [
        "ActiveViewCpm"
    ],
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewCpm'}));
    }
];
