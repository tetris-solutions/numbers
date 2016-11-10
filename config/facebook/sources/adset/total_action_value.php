<?php
return [
    "metric" => "total_action_value",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "total_action_value"
    ],
    "parse" => function ($data) {
        return floatval($data->total_action_value);
    }
];
