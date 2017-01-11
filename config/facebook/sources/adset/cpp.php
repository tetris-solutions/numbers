<?php
return [
    "metric" => "cpp",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "cpp"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cpp'}));
    },
    "sum" => NULL
];
