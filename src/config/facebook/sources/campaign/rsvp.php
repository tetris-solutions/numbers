<?php
return [
    "metric" => "rsvp",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'rsvp') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
