<?php
return [
    "metric" => "unique_ctr",
    "entity" => "Campaign",
    "fields" => [
        "unique_ctr"
    ],
    "report" => "FB_CAMPAIGN",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_ctr'}));
    }
];
