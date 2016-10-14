<?php
return [
    "metric" => "onsite_conversion.flow_complete",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'onsite_conversion.flow_complete') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
