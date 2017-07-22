<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Campaign",
    "fields" => [
        "ActiveViewCpm"
    ],
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewCpm'}));
    }
];
