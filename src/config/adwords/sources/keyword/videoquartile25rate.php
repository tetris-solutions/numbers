<?php
return [
    "metric" => "videoquartile25rate",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile25Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoQuartile25Rate)) / 100;
    },
    "inferred_from" => [
        "videoviews"
    ],
    "sum" => function (array $rows) {
        $totalViews = 0;
        $partialViews = 0;
        foreach ($rows as $row) {
            $totalViews += $row->videoviews;
            $partialViews += $row->videoviews * $row->videoquartile25rate;
        }
        return (float)$totalViews !== 0.0
            ? $partialViews / $totalViews
            : 0;
    }
];
