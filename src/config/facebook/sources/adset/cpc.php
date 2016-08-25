<?php
return [
    "metric" => "cpc",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "cpc"
    ],
    "parse" => function ($data) {
        return intval($data->cpc) / 100;
    }
];
