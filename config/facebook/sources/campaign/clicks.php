<?php
return [
    "metric" => "clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->clicks;
    }
];
