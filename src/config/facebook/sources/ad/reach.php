<?php
return [
    "metric" => "reach",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "reach"
    ],
    "parse" => function ($data) {
        return (float)$data->reach;
    }
];
