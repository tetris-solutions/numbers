<?php
return [
    "metric" => "video_p50_watched_actions",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "video_p50_watched_actions"
    ],
    "parse" => function ($data) {
        foreach ($data->video_p50_watched_actions as $action) {
            if ($action['action_type'] === 'video_view') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
