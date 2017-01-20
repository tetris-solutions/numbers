<?php
return [
    "metric" => "cpv100",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "Cost",
        "VideoQuartile100Rate",
        "VideoViews"
    ],
    "parse" => function ($data) {
        $cost = floatval(str_replace(',', '', $data->{'Cost'}));
        $fullViewPercent = str_replace(['%', ','], '', $data->{'VideoQuartile100Rate'});
        $fullViewPercent = floatval($fullViewPercent) / 100;
    
        $allViews = intval(str_replace(',', '', $data->{'VideoViews'}));
    
        $fullViews = $allViews * $fullViewPercent;
    
        return $fullViews === 0.0 ? 0.0 : $cost / $fullViews;
    },
    "inferred_from" => [
        "cost",
        "videoquartile100rate",
        "videoviews"
    ],
    "sum" => function (array $rows) {
        $costMetric = 'cost';
        $v100Metric = 'videoquartile100rate';
        $viewsMetric = 'videoviews';
    
        $totalCost = 0;
        $totalFullViews = 0;
    
        foreach ($rows as $row) {
            $totalCost += $row->{$costMetric};
    
            $fullViewPercent = $row->{$v100Metric};
            $allViews = $row->{$viewsMetric};
    
            $totalFullViews += $allViews * $fullViewPercent;
        }
    
    
        return $totalFullViews === 0.0 ? 0 : $totalCost / $totalFullViews;
    }
];
