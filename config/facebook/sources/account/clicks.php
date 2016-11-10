<?php
return [
    "metric" => "clicks",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->clicks;
    }
];
