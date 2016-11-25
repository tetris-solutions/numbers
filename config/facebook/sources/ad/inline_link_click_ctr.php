<?php
return [
    "metric" => "inline_link_click_ctr",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "inline_link_click_ctr"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->inline_link_click_ctr);
    }
];
