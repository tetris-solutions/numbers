<?php
return [
    "metric" => "video_p75_watched_actions",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "video_p75_watched_actions"
    ],
    "parse" => function ($data) {
        foreach ($data->video_p75_watched_actions as $action) {
            if ($action['action_type'] === 'video_view') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
