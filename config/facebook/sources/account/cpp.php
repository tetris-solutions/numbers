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
        return (float)str_replace(',', '', $data->cpp);
    }
];
