<?php
return [
    "metric" => "cost_per_unique_inline_link_click",
    "entity" => "Account",
    "fields" => [
        "cost_per_unique_inline_link_click"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cost_per_unique_inline_link_click'}));
    }
];
