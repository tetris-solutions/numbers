<?php
return [
    "metric" => "commerce_event.view_content",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'commerce_event.view_content') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
