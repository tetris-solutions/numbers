<?php
return [
    "metric" => "unique_clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "unique_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->unique_clicks);
    }
];
