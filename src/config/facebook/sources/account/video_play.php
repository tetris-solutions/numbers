<?php
return [
    "metric" => "video_play",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'video_play') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
