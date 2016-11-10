<?php
return [
    "metric" => "clicks",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->clicks;
    }
];
