<?php
return [
    "metric" => "spend",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "spend"
    ],
    "parse" => function ($data) {
        return (float)$data->spend;
    }
];
