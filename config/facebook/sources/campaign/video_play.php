<?php
return [
    "metric" => "video_play",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'video_play') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
