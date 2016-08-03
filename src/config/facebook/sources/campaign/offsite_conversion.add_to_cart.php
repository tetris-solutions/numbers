<?php
return [
    "metric" => "offsite_conversion.add_to_cart",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.add_to_cart') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
