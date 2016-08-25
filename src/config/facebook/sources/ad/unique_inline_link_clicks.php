<?php
return [
    "metric" => "unique_inline_link_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "unique_inline_link_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_inline_link_clicks;
    }
];
