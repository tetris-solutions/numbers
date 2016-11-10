<?php
return [
    "metric" => "total_unique_actions",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "total_unique_actions"
    ],
    "parse" => function ($data) {
        return (float)$data->total_unique_actions;
    }
];
