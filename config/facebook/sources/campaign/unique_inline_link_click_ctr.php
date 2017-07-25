<?php
return [
    "metric" => "unique_inline_link_click_ctr",
    "entity" => "Campaign",
    "fields" => [
        "unique_inline_link_click_ctr"
    ],
    "report" => "FB_CAMPAIGN",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_inline_link_click_ctr'}));
    }
];
