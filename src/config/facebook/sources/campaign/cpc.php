<?php
return [
    "metric" => "cpc",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "cpc"
    ],
    "parse" => function ($data) {
        return (float)$data->cpc;
    }
];
