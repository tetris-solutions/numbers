<?php
return [
    "metric" => "receive_offer",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
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
