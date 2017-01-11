<?php
return [
    "metric" => "videoquartile25rate",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile25Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(['%', ','], '', $data->VideoQuartile25Rate)) / 100;
    },
    "inferred_from" => [
        "videoviews"
    ],
    "sum" => function (array $rows) {
        $quartileViewMetric = 'videoquartile25rate';
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
