<?php
return [
    "metric" => "unique_link_clicks_ctr",
    "entity" => "Ad",
    "fields" => [
        "unique_link_clicks_ctr"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_link_clicks_ctr'}));
    }
];
