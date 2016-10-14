<?php
return [
    "metric" => "onsite_conversion.messaging_block",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'onsite_conversion.messaging_block') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
