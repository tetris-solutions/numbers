<?php
return [
    "metric" => "unique_inline_link_click_ctr",
    "entity" => "AdSet",
    "fields" => [
        "unique_inline_link_click_ctr"
    ],
    "report" => "FB_ADSET",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_inline_link_click_ctr'}));
    }
];
