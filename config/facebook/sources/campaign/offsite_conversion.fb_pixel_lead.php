<?php
return [
    "metric" => "offsite_conversion.fb_pixel_lead",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.fb_pixel_lead') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
