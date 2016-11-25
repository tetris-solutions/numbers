<?php
return [
    "metric" => "app_custom_event.fb_mobile_purchase",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'app_custom_event.fb_mobile_purchase') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
