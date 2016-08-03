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
        return intval($data->cpp) / 100;
    }
];
