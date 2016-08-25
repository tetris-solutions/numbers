<?php
return [
    "metric" => "cost_per_inline_link_click",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "cost_per_inline_link_click"
    ],
    "parse" => function ($data) {
        return intval($data->cost_per_inline_link_click) / 100;
    }
];
