<?php
return [
    "metric" => "cost_per_inline_link_click",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "cost_per_inline_link_click"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->cost_per_inline_link_click);
    },
    "sum" => NULL
];
