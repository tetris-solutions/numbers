<?php
return [
    "metric" => "total_actions",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "total_actions"
    ],
    "parse" => function ($data) {
        return (float)$data->total_actions;
    }
];
