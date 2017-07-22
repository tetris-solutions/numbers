<?php
return [
    "metric" => "videoquartile25rate",
    "entity" => "Ad",
    "fields" => [
        "VideoQuartile25Rate"
    ],
    "inferred_from" => [
        "videoviews"
    ],
    "report" => "AD_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'VideoQuartile25Rate'});
    
        return floatval($valueAsNumericString) / 100;
    },
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
