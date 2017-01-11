<?php
return [
    "metric" => "video_avg_percent_watched_actions",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "video_avg_percent_watched_actions"
    ],
    "parse" => function ($data) {
        $collection = 'video_avg_percent_watched_actions';
        $type = 'video_view';
    
        if (empty($data->{$collection})) return NULL;
    
        foreach ($data->{$collection} as $action) {
            if ($action['action_type'] === $type) {
                return (float)str_replace(',', '', $action['value']);
            }
        }
    
        return NULL;
    },
    "sum" => NULL
];
