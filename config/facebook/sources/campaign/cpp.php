<?php
return [
    "metric" => "cpp",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "cpp"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cpp'}));
    },
    "sum" => NULL
];
