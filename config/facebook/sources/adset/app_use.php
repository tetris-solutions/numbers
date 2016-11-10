<?php
return [
    "metric" => "app_use",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'app_use') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
