<?php
return [
    "metric" => "inline_link_click_ctr",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "inline_link_click_ctr"
    ],
    "parse" => function ($data) {
        return (float)$data->inline_link_click_ctr;
    }
];
