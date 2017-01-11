<?php
return [
    "metric" => "numofflineinteractions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "NumOfflineInteractions"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'NumOfflineInteractions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'numofflineinteractions'};
            },
            0.0
        );
    }
];
