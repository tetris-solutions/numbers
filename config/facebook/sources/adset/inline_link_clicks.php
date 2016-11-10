<?php
return [
    "metric" => "inline_link_clicks",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "inline_link_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->inline_link_clicks;
    }
];
