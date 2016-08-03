<?php
return [
    "metric" => "like",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'like') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
