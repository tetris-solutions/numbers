<?php
return [
    "metric" => "unique_ctr",
    "entity" => "Account",
    "fields" => [
        "unique_ctr"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_ctr'}));
    }
];
