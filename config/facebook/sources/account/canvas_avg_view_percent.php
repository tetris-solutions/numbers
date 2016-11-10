<?php
return [
    "metric" => "canvas_avg_view_percent",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "canvas_avg_view_percent"
    ],
    "parse" => function ($data) {
        return (float)$data->canvas_avg_view_percent;
    }
];
