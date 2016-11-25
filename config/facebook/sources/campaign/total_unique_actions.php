<?php
return [
    "metric" => "total_unique_actions",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "total_unique_actions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->total_unique_actions);
    }
];
