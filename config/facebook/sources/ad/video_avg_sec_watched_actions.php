<?php
return [
    "metric" => "video_avg_sec_watched_actions",
    "entity" => "Ad",
    "fields" => [
        "video_avg_sec_watched_actions"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data) {
        $collection = 'video_avg_sec_watched_actions';
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
