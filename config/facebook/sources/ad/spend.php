<?php
return [
    "metric" => "spend",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "spend"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->spend);
    }
];
