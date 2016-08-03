<?php
return [
    "metric" => "total_action_value",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "total_action_value"
    ],
    "parse" => function ($data) {
        return intval($data->total_action_value) / 100;
    }
];
