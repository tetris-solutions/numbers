<?php
return [
    "metric" => "cpp",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "cpp"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->cpp);
    },
    "sum" => NULL
];
