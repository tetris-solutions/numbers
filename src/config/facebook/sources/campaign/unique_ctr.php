<?php
return [
    "metric" => "unique_ctr",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "unique_ctr"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_ctr;
    }
];
