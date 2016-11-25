<?php
return [
    "metric" => "app_custom_event.fb_mobile_achievement_unlocked",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'app_custom_event.fb_mobile_achievement_unlocked') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
