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
        return (float)str_replace(',', '', $data->canvas_avg_view_time);
    },
    "sum" => NULL
];
