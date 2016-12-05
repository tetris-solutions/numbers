<?php
return [
    "metric" => "unique_inline_link_clicks",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "unique_inline_link_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->unique_inline_link_clicks);
    },
    "sum" => NULL
];
