<?php
return [
    "metric" => "unique_clicks",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "unique_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->unique_clicks);
    }
];
