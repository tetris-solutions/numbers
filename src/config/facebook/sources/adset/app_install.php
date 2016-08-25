<?php
return [
    "metric" => "app_install",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'app_install') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
