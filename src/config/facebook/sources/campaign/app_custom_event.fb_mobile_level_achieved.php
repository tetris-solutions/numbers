<?php
return [
    "metric" => "app_custom_event.fb_mobile_level_achieved",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'app_custom_event.fb_mobile_level_achieved') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
