<?php
return [
    "metric" => "checkin",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'checkin') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
