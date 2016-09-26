<?php
return [
    "metric" => "videoquartile75rate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile75Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoQuartile75Rate)) / 100;
    },
    "inferred_from" => [
        "videoviews"
    ],
    "sum" => function (array $rows) {
        $totalViews = 0;
        $partialViews = 0;
        foreach ($rows as $row) {
            $totalViews += $row->videoviews;
            $partialViews += $row->videoviews * $row->videoquartile75rate;
        }
        return (float)$totalViews !== 0.0
            ? $partialViews / $totalViews
            : 0;
    }
];
