<?php
return [
    "metric" => "reach",
    "entity" => "Account",
    "fields" => [
        "reach"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'reach'}));
    }
];
