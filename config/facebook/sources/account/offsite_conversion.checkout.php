<?php
return [
    "metric" => "offsite_conversion.checkout",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.checkout') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
