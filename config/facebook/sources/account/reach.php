<?php
return [
    "metric" => "reach",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "reach"
    ],
    "parse" => function ($data) {
        return (float)$data->reach;
    }
];
