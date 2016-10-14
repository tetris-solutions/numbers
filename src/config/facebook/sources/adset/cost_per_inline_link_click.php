<?php
return [
    "metric" => "cost_per_inline_link_click",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "cost_per_inline_link_click"
    ],
    "parse" => function ($data) {
        return (float)$data->cost_per_inline_link_click;
    }
];
