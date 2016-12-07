<?php
return [
    "metric" => "ctr",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "ctr"
    ],
    "parse" => function ($data) {
        return floatval(str_replace(',', '', $data->ctr)) / 100;
    },
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->{'clicks'};
            $sumDivisor += $row->{'impressions'};
        }
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    },
    "inferred_from" => [
        "clicks",
        "impressions"
    ]
];
