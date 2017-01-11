<?php
return [
    "metric" => "video_30_sec_watched_actions",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "video_30_sec_watched_actions"
    ],
    "parse" => function ($data) {
        foreach ($data->{'video_30_sec_watched_actions'} as $action) {
            if ($action['action_type'] === 'video_view') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'video_30_sec_watched_actions'};
            },
            0.0
        );
    }
];
