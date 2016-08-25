<?php
return [
    "metric" => "cpc",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "cpc"
    ],
    "parse" => function ($data) {
        return intval($data->cpc) / 100;
    }
];
