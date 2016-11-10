<?php
return [
    "metric" => "canvas_avg_view_percent",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "canvas_avg_view_percent"
    ],
    "parse" => function ($data) {
        return (float)$data->canvas_avg_view_percent;
    }
];
