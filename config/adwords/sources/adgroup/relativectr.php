<?php
return [
    "metric" => "relativectr",
    "entity" => "AdGroup",
    "fields" => [
        "RelativeCtr"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'RelativeCtr'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'relativectr'};
            },
            0.0
        );
    }
];
