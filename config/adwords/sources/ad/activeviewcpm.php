<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Ad",
    "fields" => [
        "ActiveViewCpm"
    ],
    "report" => "AD_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewCpm'}));
    }
];
