<?php
return [
    "metric" => "onsite_conversion.flow_complete",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'onsite_conversion.flow_complete') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
