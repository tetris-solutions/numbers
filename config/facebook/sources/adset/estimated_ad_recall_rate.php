<?php
return [
    "metric" => "estimated_ad_recall_rate",
    "entity" => "AdSet",
    "fields" => [
        "estimated_ad_recall_rate"
    ],
    "report" => "FB_ADSET",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'estimated_ad_recall_rate'}));
    }
];
