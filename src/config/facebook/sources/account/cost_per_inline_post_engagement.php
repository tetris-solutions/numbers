<?php
return [
    "metric" => "cost_per_inline_post_engagement",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "cost_per_inline_post_engagement"
    ],
    "parse" => function ($data) {
        return intval($data->cost_per_inline_post_engagement) / 100;
    }
];
