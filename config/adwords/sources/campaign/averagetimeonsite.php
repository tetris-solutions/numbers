<?php
return [
    "metric" => "averagetimeonsite",
    "entity" => "Campaign",
    "fields" => [
        "AverageTimeOnSite"
    ],
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AverageTimeOnSite'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'averagetimeonsite'};
            },
            0.0
        );
    }
];
