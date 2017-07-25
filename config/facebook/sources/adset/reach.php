<?php
return [
    "metric" => "reach",
    "entity" => "AdSet",
    "fields" => [
        "reach"
    ],
    "report" => "FB_ADSET",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'reach'}));
    }
];
