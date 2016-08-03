<?php
return [
    "metric" => "unique_inline_link_clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "unique_inline_link_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_inline_link_clicks;
    }
];
