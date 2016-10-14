<?php
return [
    "metric" => "offsite_conversion.fb_pixel_initiate_checkout",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.fb_pixel_initiate_checkout') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
