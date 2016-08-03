<?php
return [
    "metric" => "total_unique_actions",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "total_unique_actions"
    ],
    "parse" => function ($data) {
        return (float)$data->total_unique_actions;
    }
];
