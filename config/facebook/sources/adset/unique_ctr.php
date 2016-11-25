<?php
return [
    "metric" => "unique_ctr",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "unique_ctr"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->unique_ctr);
    }
];
