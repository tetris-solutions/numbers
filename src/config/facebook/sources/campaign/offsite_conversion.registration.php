<?php
return [
    "metric" => "offsite_conversion.registration",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
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
