<?php
return [
    "metric" => "videoquartile100rate",
    "entity" => "Search",
    "fields" => [
        "VideoQuartile100Rate"
    ],
    "inferred_from" => [
        "videoviews"
    ],
    "report" => "SEARCH_QUERY_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'VideoQuartile100Rate'});
    
        return floatval($valueAsNumericString) / 100;
    },
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
