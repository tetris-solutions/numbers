<?php
return [
    "metric" => "canvas_avg_view_time",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "canvas_avg_view_time"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->canvas_avg_view_time);
    },
    "sum" => NULL
];
