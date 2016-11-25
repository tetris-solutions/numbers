<?php
return [
    "metric" => "tab_view",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'tab_view') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
