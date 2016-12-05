<?php
return [
    "metric" => "estimated_ad_recall_rate",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "estimated_ad_recall_rate"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->estimated_ad_recall_rate);
    },
    "sum" => NULL
];
