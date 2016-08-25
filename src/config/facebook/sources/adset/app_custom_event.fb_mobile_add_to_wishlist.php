<?php
return [
    "metric" => "app_custom_event.fb_mobile_add_to_wishlist",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'app_custom_event.fb_mobile_add_to_wishlist') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
