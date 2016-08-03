<?php
return [
    "metric" => "frequency",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "frequency"
    ],
    "parse" => function ($data) {
        return (float)$data->frequency;
    }
];
