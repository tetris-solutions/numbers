<?php
return [
    "metric" => "unique_inline_link_click_ctr",
    "entity" => "Account",
    "fields" => [
        "unique_inline_link_click_ctr"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_inline_link_click_ctr'}));
    }
];
