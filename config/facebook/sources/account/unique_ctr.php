<?php
return [
    "metric" => "unique_ctr",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "unique_ctr"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->unique_ctr);
    }
];
