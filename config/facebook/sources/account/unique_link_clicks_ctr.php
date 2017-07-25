<?php
return [
    "metric" => "unique_link_clicks_ctr",
    "entity" => "Account",
    "fields" => [
        "unique_link_clicks_ctr"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_link_clicks_ctr'}));
    }
];
