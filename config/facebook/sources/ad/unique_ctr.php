<?php
return [
    "metric" => "unique_ctr",
    "entity" => "Ad",
    "fields" => [
        "unique_ctr"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_ctr'}));
    }
];
