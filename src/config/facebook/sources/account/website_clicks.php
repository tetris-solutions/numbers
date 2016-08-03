<?php
return [
    "metric" => "website_clicks",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "website_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->website_clicks;
    }
];
