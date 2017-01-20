<?php
return [
    "metric" => "tdv",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "tdv"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'tdv'}));
    },
    "sum" => NULL
];
