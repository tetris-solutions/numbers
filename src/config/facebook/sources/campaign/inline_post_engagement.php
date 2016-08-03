<?php
return [
    "metric" => "inline_post_engagement",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "inline_post_engagement"
    ],
    "parse" => function ($data) {
        return (float)$data->inline_post_engagement;
    }
];
