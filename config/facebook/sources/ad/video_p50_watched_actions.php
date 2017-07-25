<?php
return [
    "metric" => "video_p50_watched_actions",
    "entity" => "Ad",
    "fields" => [
        "video_p50_watched_actions"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data) {
        $collection = 'video_p50_watched_actions';
        $type = 'video_view';
    
        if (empty($data->{$collection})) return NULL;
    
        foreach ($data->{$collection} as $action) {
            if ($action['action_type'] === $type) {
                return (float)str_replace(',', '', $action['value']);
            }
        }
    
        return NULL;
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'video_p50_watched_actions'};
            },
            0.0
        );
    }
];
