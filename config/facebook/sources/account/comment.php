<?php
return [
    "metric" => "comment",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'comment') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
