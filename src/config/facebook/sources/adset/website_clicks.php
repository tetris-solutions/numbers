<?php
return [
    "metric" => "website_clicks",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "website_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->website_clicks;
    }
];
