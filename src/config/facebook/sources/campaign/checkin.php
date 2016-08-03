<?php
return [
    "metric" => "checkin",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'checkin') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
