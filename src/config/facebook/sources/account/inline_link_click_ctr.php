<?php
return [
    "metric" => "inline_link_click_ctr",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "inline_link_click_ctr"
    ],
    "parse" => function ($data) {
        return (float)$data->inline_link_click_ctr;
    }
];
