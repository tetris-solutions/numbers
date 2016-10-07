<?php
return [
    "metric" => "cpp",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "cpp"
    ],
    "parse" => function ($data) {
        return floatval($data->cpp);
    }
];
