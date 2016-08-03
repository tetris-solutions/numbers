<?php
return [
    "metric" => "photo_view",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'photo_view') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
