<?php
return [
    "metric" => "cpv100",
    "entity" => "AdGroup",
    "fields" => [
        "Cost",
        "VideoQuartile100Rate",
        "VideoViews"
    ],
    "inferred_from" => [
        "cost",
        "videoquartile100rate",
        "videoviews"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        $cost = floatval(str_replace(',', '', $data->{'Cost'}));
        $fullViewPercent = str_replace(['%', ','], '', $data->{'VideoQuartile100Rate'});
        $fullViewPercent = floatval($fullViewPercent) / 100;
    
        $allViews = intval(str_replace(',', '', $data->{'VideoViews'}));
    
        $fullViews = $allViews * $fullViewPercent;
    
        return $fullViews === 0.0 ? 0.0 : $cost / $fullViews;
    },
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
