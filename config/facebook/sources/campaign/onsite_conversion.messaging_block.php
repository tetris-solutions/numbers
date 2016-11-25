<?php
return [
    "metric" => "onsite_conversion.messaging_block",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'onsite_conversion.messaging_block') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
