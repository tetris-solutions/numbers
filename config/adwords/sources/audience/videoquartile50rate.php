<?php
return [
    "metric" => "videoquartile50rate",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile50Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(['%', ','], '', $data->VideoQuartile50Rate)) / 100;
    },
    "inferred_from" => [
        "videoviews"
    ],
    "sum" => function (array $rows) {
        $quartileViewMetric = 'videoquartile50rate';
        $totalViewsMetric = 'videoviews';
    
        $totalViews = 0;
        $partialViews = 0;
    
        foreach ($rows as $row) {
            $totalViews += $row->{$totalViewsMetric};
            $partialViews += $row->{$totalViewsMetric} * $row->{$quartileViewMetric};
        }
    
        return (float)$totalViews !== 0.0
            ? $partialViews / $totalViews
            : 0;
    }
];
