<?php
return [
    "metric" => "cost_per_total_action",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "cost_per_total_action"
    ],
    "parse" => function ($data) {
        return intval($data->cost_per_total_action) / 100;
    }
];
