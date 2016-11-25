<?php
return [
    "metric" => "offsite_conversion.fb_pixel_initiate_checkout",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.fb_pixel_initiate_checkout') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
