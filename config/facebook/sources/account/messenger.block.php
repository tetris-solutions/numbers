<?php
return [
    "metric" => "messenger.block",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'messenger.block') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
