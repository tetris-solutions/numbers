<?php
return [
    "metric" => "cost_per_unique_inline_link_click",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "cost_per_unique_inline_link_click"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->cost_per_unique_inline_link_click);
    }
];
