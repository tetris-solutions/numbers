<?php
return [
    "metric" => "unique_inline_link_clicks",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "unique_inline_link_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->unique_inline_link_clicks);
    }
];
