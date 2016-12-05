<?php
return [
    "metric" => "inline_link_clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "inline_link_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->inline_link_clicks);
    },
    "sum" => NULL
];
