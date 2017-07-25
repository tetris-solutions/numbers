<?php
return [
    "metric" => "reach",
    "entity" => "Ad",
    "fields" => [
        "reach"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'reach'}));
    }
];
