<?php
return [
    "metric" => "cpp",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "cpp"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cpp'}));
    },
    "sum" => NULL
];
