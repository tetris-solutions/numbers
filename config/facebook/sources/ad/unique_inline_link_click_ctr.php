<?php
return [
    "metric" => "unique_inline_link_click_ctr",
    "entity" => "Ad",
    "fields" => [
        "unique_inline_link_click_ctr"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_inline_link_click_ctr'}));
    }
];
