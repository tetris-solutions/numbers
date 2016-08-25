<?php
return [
    "metric" => "credit_spent",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
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
