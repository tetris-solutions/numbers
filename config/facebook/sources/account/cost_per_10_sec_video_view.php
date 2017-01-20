<?php
return [
    "metric" => "cost_per_10_sec_video_view",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "cost_per_10_sec_video_view"
    ],
    "parse" => function ($data) {
        $collection = 'cost_per_10_sec_video_view';
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
                return $carry + $row->{'cost_per_10_sec_video_view'};
            },
            0.0
        );
    }
];
