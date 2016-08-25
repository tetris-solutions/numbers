<?php
return [
    "metric" => "offsite_conversion.checkout",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
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
