<?php
return [
    "metric" => "unique_ctr",
    "entity" => "AdSet",
    "fields" => [
        "unique_ctr"
    ],
    "report" => "FB_ADSET",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_ctr'}));
    }
];
