<?php
return [
    "metric" => "videoquartile100rate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile100Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoQuartile100Rate)) / 100;
    },
    "inferred_from" => [
        "videoviews"
    ],
    "sum" => function (array $rows) {
        $totalViews = 0;
        $partialViews = 0;
        foreach ($rows as $row) {
            $totalViews += $row->videoviews;
            $partialViews += $row->videoviews * $row->videoquartile100rate;
        }
        return $totalViews !== 0
            ? $partialViews / $totalViews
            : 0;
    }
];
