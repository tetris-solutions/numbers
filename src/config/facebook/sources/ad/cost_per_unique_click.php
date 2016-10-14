<?php
return [
    "metric" => "cost_per_unique_click",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "cost_per_unique_click"
    ],
    "parse" => function ($data) {
        return (float)$data->cost_per_unique_click;
    }
];
