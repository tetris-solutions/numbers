<?php
return [
    "metric" => "reach",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "reach"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->reach);
    },
    "sum" => NULL
];
