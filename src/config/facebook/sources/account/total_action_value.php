<?php
return [
    "metric" => "total_action_value",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "total_action_value"
    ],
    "parse" => function ($data) {
        return (float)$data->total_action_value;
    }
];
