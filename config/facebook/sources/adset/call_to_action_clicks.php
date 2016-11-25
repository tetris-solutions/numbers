<?php
return [
    "metric" => "call_to_action_clicks",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "call_to_action_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->call_to_action_clicks);
    }
];
