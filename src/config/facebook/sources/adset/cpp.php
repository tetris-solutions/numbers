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
        return (float)$data->cpp;
    }
];
