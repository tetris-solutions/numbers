<?php
return [
    "metric" => "like",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'like') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
