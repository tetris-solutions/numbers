<?php
return [
    "metric" => "inline_link_click_ctr",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "inline_link_click_ctr"
    ],
    "parse" => function ($data) {
        return (float)$data->inline_link_click_ctr;
    }
];
