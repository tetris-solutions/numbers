<?php
return [
    "metric" => "canvas_avg_view_time",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "canvas_avg_view_time"
    ],
    "parse" => function ($data) {
        return floatval($data->canvas_avg_view_time);
    }
];
