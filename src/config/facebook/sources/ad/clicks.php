<?php
return [
    "metric" => "clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->clicks;
    }
];
