<?php
return [
    "metric" => "newsfeed_avg_position",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "newsfeed_avg_position"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'newsfeed_avg_position'});
    },
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->{'newsfeed_avg_position'} * $row->{'impressions'};
            $sumDivisor += $row->{'impressions'};
        }
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    },
    "inferred_from" => [
        "impressions"
    ]
];
