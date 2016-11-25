<?php
return [
    "metric" => "cost_per_total_action",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "cost_per_total_action"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->cost_per_total_action);
    }
];
