<?php
return [
    "metric" => "inline_post_engagement",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "inline_post_engagement"
    ],
    "parse" => function ($data) {
        return (float)$data->inline_post_engagement;
    }
];
