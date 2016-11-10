<?php
return [
    "metric" => "total_action_value",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "total_action_value"
    ],
    "parse" => function ($data) {
        return floatval($data->total_action_value);
    }
];
