<?php
return [
    "metric" => "total_actions",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "total_actions"
    ],
    "parse" => function ($data) {
        return (float)$data->total_actions;
    }
];
