<?php
return [
    "metric" => "reach",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "reach"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->reach);
    },
    "sum" => NULL
];
