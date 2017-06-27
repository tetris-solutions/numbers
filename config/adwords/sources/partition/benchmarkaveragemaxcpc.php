<?php
return [
    "metric" => "benchmarkaveragemaxcpc",
    "entity" => "Partition",
    "platform" => "adwords",
    "report" => "PRODUCT_PARTITION_REPORT",
    "fields" => [
        "BenchmarkAverageMaxCpc"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'BenchmarkAverageMaxCpc'}));
    }
];
