<?php
return [
    "metric" => "credit_spent",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'credit_spent') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
