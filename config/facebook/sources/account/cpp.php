<?php
return [
    "metric" => "cpp",
    "entity" => "Account",
    "fields" => [
        "cpp"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cpp'}));
    }
];
