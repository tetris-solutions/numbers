<?php
return [
    "metric" => "cpc",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "cpc"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'cpc'});
    },
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->{'spend'};
            $sumDivisor += $row->{'clicks'};
        }
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    },
    "inferred_from" => [
        "spend",
        "clicks"
    ]
];
