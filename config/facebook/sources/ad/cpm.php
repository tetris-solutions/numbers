<?php
return [
    "metric" => "cpm",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "cpm"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->cpm);
    }
];
