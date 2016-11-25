<?php
return [
    "metric" => "frequency",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "frequency"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->frequency);
    }
];
