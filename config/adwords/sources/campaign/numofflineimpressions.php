<?php
return [
    "metric" => "numofflineimpressions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "NumOfflineImpressions"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'NumOfflineImpressions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'numofflineimpressions'};
            },
            0.0
        );
    }
];
