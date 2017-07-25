<?php
return [
    "metric" => "estimated_ad_recall_rate",
    "entity" => "Ad",
    "fields" => [
        "estimated_ad_recall_rate"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'estimated_ad_recall_rate'}));
    }
];
