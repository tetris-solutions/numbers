<?php
return [
    "metric" => "cost_per_unique_click",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "cost_per_unique_click"
    ],
    "parse" => function ($data) {
        return (float)$data->cost_per_unique_click;
    }
];
