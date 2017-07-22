<?php
return [
    "metric" => "numofflineimpressions",
    "entity" => "AdGroup",
    "fields" => [
        "NumOfflineImpressions"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "platform" => "adwords",
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
