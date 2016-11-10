<?php
return [
    "metric" => "offsite_conversion.registration",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.registration') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
