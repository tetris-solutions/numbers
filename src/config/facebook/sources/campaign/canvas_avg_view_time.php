<?php
return [
    "metric" => "canvas_avg_view_time",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "canvas_avg_view_time"
    ],
    "parse" => function ($data) {
        return (float)$data->canvas_avg_view_time;
    }
];
