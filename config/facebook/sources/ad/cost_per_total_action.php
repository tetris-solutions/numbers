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
        return floatval($data->cost_per_total_action);
    }
];
