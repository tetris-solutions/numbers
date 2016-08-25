<?php
return [
    "metric" => "cpp",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "cpp"
    ],
    "parse" => function ($data) {
        return intval($data->cpp) / 100;
    }
];
