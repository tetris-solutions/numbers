<?php
return [
    "metric" => "app_install",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'app_install') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
