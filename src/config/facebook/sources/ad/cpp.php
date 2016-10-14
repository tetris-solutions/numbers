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
        return (float)$data->cpp;
    }
];
