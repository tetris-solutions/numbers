<?php
return [
    "metric" => "cpp",
    "entity" => "Ad",
    "fields" => [
        "cpp"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cpp'}));
    }
];
