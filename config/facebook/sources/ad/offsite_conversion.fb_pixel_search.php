<?php
return [
    "metric" => "offsite_conversion.fb_pixel_search",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.fb_pixel_search') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
