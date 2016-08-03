<?php
return [
    "metric" => "mobile_app_install",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'mobile_app_install') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
