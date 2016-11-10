<?php
return [
    "metric" => "onsite_conversion.purchase",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'onsite_conversion.purchase') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
