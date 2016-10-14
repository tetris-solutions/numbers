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
        return (float)$data->total_action_value;
    }
];
