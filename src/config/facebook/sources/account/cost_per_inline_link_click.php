<?php
return [
    "metric" => "cost_per_inline_link_click",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "cost_per_inline_link_click"
    ],
    "parse" => function ($data) {
        return intval($data->cost_per_inline_link_click) / 100;
    }
];
