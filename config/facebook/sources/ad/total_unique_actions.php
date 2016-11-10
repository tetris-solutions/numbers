<?php
return [
    "metric" => "total_unique_actions",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "total_unique_actions"
    ],
    "parse" => function ($data) {
        return (float)$data->total_unique_actions;
    }
];
