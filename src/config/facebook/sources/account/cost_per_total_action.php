<?php
return [
    "metric" => "cost_per_total_action",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "cost_per_total_action"
    ],
    "parse" => function ($data) {
        return intval($data->cost_per_total_action) / 100;
    }
];
