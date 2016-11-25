<?php
return [
    "metric" => "cpp",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "cpp"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->cpp);
    }
];
