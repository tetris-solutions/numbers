<?php
return [
    "metric" => "offsite_conversion.checkout",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.checkout') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
