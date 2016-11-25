<?php
return [
    "metric" => "call_to_action_clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "call_to_action_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->call_to_action_clicks);
    }
];
