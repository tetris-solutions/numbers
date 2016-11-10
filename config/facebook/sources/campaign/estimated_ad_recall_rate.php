<?php
return [
    "metric" => "estimated_ad_recall_rate",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "estimated_ad_recall_rate"
    ],
    "parse" => function ($data) {
        return (float)$data->estimated_ad_recall_rate;
    }
];
