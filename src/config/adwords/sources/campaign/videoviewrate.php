<?php
return [
    "metric" => "videoviewrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["videoviews", "impressions"],
    "fields" => [
        "VideoViewRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoViewRate)) / 100;
    },
    "sum" => function (array $rows) {
        $sumVideoViews = 0;
        $sumImpressions = 0;

        foreach ($rows as $row) {
            $sumVideoViews += $row->videoviews;
            $sumImpressions += $row->impressions;
        }

        return $sumImpressions !== 0
            ? $sumImpressions / $sumImpressions
            : 0;
    }
];
