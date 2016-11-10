<?php
return [
    "metric" => "messenger.block",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'messenger.block') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
