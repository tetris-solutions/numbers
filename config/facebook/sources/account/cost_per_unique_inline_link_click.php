<?php
return [
    "metric" => "cost_per_unique_inline_link_click",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "cost_per_unique_inline_link_click"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cost_per_unique_inline_link_click'}));
    },
    "sum" => NULL
];
