<?php
return [
    "metric" => "onsite_conversion.messaging_first_reply",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'onsite_conversion.messaging_first_reply') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
