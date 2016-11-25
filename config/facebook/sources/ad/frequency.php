<?php
return [
    "metric" => "frequency",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "frequency"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->frequency);
    }
];
