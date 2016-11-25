<?php
return [
    "metric" => "ctr",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "ctr"
    ],
    "parse" => function ($data) {
        return floatval(str_replace(',', '', $data->ctr)) / 100;
    }
];
