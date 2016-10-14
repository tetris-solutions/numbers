<?php
return [
    "metric" => "onsite_conversion.messaging_reply",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'onsite_conversion.messaging_reply') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
