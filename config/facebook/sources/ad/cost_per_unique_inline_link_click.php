<?php
return [
    "metric" => "cost_per_unique_inline_link_click",
    "entity" => "Ad",
    "fields" => [
        "cost_per_unique_inline_link_click"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cost_per_unique_inline_link_click'}));
    }
];
