<?php
return [
    "metric" => "averagetimeonsite",
    "entity" => "AdGroup",
    "fields" => [
        "AverageTimeOnSite"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
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
