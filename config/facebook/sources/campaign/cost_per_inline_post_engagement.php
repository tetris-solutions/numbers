<?php
return [
    "metric" => "cost_per_inline_post_engagement",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "cost_per_inline_post_engagement"
    ],
    "parse" => function ($data) {
        return floatval($data->cost_per_inline_post_engagement);
    }
];
