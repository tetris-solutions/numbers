<?php
return [
    "metric" => "video_avg_time_watched_actions",
    "entity" => "Campaign",
    "fields" => [
        "video_avg_time_watched_actions"
    ],
    "report" => "FB_CAMPAIGN",
    "platform" => "facebook",
    "parse" => function ($data) {
        $collection = 'video_avg_time_watched_actions';
        $type = 'video_view';
    
        if (empty($data->{$collection})) return NULL;
    
        foreach ($data->{$collection} as $action) {
            if ($action['action_type'] === $type) {
                return (float)str_replace(',', '', $action['value']);
            }
        }
    
        return NULL;
    }
];
