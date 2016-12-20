<?php
return [
    "metric" => "unique_inline_link_click_ctr",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "unique_inline_link_click_ctr"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'unique_inline_link_click_ctr'});
    },
    "sum" => NULL
];
