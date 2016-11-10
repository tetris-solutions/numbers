<?php
return [
    "metric" => "frequency",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "frequency"
    ],
    "parse" => function ($data) {
        return (float)$data->frequency;
    }
];
