<?php
return [
    "metric" => "cost_per_inline_post_engagement",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "cost_per_inline_post_engagement"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->cost_per_inline_post_engagement);
    }
];
