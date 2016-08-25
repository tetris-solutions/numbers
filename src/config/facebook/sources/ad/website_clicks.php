<?php
return [
    "metric" => "website_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "website_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->website_clicks;
    }
];
