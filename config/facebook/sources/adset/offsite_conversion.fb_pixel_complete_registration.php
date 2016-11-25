<?php
return [
    "metric" => "offsite_conversion.fb_pixel_complete_registration",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.fb_pixel_complete_registration') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
