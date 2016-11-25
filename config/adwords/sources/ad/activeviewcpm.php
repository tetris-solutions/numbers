<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCpm"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ActiveViewCpm);
    }
];
