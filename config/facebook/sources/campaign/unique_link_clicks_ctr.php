<?php
return [
    "metric" => "unique_link_clicks_ctr",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "unique_link_clicks_ctr"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_link_clicks_ctr;
    }
];
