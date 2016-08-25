<?php
return [
    "metric" => "unique_clicks",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "unique_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_clicks;
    }
];
