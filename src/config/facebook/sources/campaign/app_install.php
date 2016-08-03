<?php
return [
    "metric" => "app_install",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
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
