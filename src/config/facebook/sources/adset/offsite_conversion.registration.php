<?php
return [
    "metric" => "offsite_conversion.registration",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.registration') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
