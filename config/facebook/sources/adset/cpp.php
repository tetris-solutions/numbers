<?php
return [
    "metric" => "cpp",
    "entity" => "AdSet",
    "fields" => [
        "cpp"
    ],
    "report" => "FB_ADSET",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cpp'}));
    }
];
