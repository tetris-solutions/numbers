<?php
return [
    "metric" => "unique_link_clicks_ctr",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "unique_link_clicks_ctr"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_link_clicks_ctr'}));
    },
    "sum" => NULL
];
