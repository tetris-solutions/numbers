<?php
return [
    "metric" => "rsvp",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
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
