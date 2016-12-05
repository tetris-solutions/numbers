<?php
return [
    "metric" => "unique_ctr",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "unique_ctr"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->unique_ctr);
    },
    "sum" => NULL
];
