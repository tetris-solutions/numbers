<?php
return [
    "metric" => "estimated_ad_recall_rate",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "estimated_ad_recall_rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'estimated_ad_recall_rate'}));
    },
    "sum" => NULL
];
