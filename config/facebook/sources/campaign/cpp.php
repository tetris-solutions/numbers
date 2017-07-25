<?php
return [
    "metric" => "cpp",
    "entity" => "Campaign",
    "fields" => [
        "cpp"
    ],
    "report" => "FB_CAMPAIGN",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cpp'}));
    }
];
