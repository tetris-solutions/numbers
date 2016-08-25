<?php
return [
    "metric" => "inline_link_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "inline_link_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->inline_link_clicks;
    }
];
