<?php
return [
    "metric" => "videoquartile100rate",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile100Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(['%', ','], '', $data->VideoQuartile100Rate)) / 100;
    },
    "inferred_from" => [
        "videoviews"
    ],
    "sum" => function (array $rows) {
        $quartileViewMetric = 'videoquartile100rate';
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
