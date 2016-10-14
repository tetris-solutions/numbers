<?php
return [
    "metric" => "video_avg_time_watched_actions",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "video_avg_time_watched_actions"
    ],
    "parse" => function ($data) {
        foreach ($data->video_avg_time_watched_actions as $action) {
            if ($action['action_type'] === 'video_view') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
