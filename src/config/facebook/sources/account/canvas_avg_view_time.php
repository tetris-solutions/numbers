<?php
return [
    "metric" => "canvas_avg_view_time",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "canvas_avg_view_time"
    ],
    "parse" => function ($data) {
        return floatval($data->canvas_avg_view_time);
    }
];
