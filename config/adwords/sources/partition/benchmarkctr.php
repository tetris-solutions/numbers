<?php
return [
    "metric" => "benchmarkctr",
    "entity" => "Partition",
    "fields" => [
        "BenchmarkCtr"
    ],
    "report" => "PRODUCT_PARTITION_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'BenchmarkCtr'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'benchmarkctr'};
            },
            0.0
        );
    }
];
