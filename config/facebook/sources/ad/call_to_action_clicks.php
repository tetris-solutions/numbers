<?php
return [
    "metric" => "call_to_action_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "call_to_action_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->call_to_action_clicks;
    }
];
