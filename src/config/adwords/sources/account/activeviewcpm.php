<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCpm"
    ],
    "parse" => function ($data): float {
        return (float)$data->ActiveViewCpm;
    }
];
