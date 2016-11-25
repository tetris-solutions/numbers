<?php
return [
    "metric" => "onsite_conversion.messaging_first_reply",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'onsite_conversion.messaging_first_reply') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
