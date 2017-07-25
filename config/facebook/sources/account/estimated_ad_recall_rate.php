<?php
return [
    "metric" => "estimated_ad_recall_rate",
    "entity" => "Account",
    "fields" => [
        "estimated_ad_recall_rate"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'estimated_ad_recall_rate'}));
    }
];
