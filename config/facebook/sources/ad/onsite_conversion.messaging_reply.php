<?php
return [
    "metric" => "onsite_conversion.messaging_reply",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'onsite_conversion.messaging_reply') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
