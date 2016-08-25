<?php
return [
    "metric" => "cost_per_total_action",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "cost_per_total_action"
    ],
    "parse" => function ($data) {
        return intval($data->cost_per_total_action) / 100;
    }
];
