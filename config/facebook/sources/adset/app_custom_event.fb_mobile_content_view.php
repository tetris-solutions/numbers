<?php
return [
    "metric" => "app_custom_event.fb_mobile_content_view",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'app_custom_event.fb_mobile_content_view') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
