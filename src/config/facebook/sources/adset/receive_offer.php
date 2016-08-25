<?php
return [
    "metric" => "receive_offer",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'receive_offer') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
