<?php
return [
    "metric" => "messenger.reply",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'messenger.reply') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
