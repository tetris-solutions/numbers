<?php
return [
    "metric" => "total_actions",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "total_actions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->total_actions);
    }
];
