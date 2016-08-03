<?php
return [
    "metric" => "cpm",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "cpm"
    ],
    "parse" => function ($data) {
        return intval($data->cpm) / 100;
    }
];
