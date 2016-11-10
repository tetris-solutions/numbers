<?php
return [
    "metric" => "offsite_conversion.other",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.other') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
