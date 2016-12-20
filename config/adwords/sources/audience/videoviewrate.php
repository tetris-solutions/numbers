<?php
return [
    "metric" => "videoviewrate",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "VideoViewRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(['%', ','], '', $data->VideoViewRate)) / 100;
    },
    "inferred_from" => [
        "videoviews",
        "impressions"
    ],
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->videoviews;
            $sumDivisor += $row->impressions;
        }
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
