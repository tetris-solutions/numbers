<?php
return [
    "metric" => "cost_per_total_action",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "cost_per_total_action"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->cost_per_total_action);
    }
];
