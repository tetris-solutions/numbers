<?php
return [
    "metric" => "spend",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "spend"
    ],
    "parse" => function ($data) {
        return (float)$data->spend;
    }
];
