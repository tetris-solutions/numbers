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
        return (float)str_replace(',', '', $data->cpp);
    },
    "sum" => NULL
];
