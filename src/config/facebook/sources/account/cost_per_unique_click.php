<?php
return [
    "metric" => "cost_per_unique_click",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "cost_per_unique_click"
    ],
    "parse" => function ($data) {
        return (float)$data->cost_per_unique_click;
    }
];
