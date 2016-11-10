<?php
return [
    "metric" => "offsite_conversion.lead",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.lead') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
