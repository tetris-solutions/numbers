<?php
return [
    "metric" => "website_clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "website_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->website_clicks;
    }
];
