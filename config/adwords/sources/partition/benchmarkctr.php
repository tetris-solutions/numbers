<?php
return [
    "metric" => "benchmarkctr",
    "entity" => "Partition",
    "platform" => "adwords",
    "report" => "PRODUCT_PARTITION_REPORT",
    "fields" => [
        "BenchmarkCtr"
    ],
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
