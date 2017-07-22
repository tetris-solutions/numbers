<?php
return [
    "metric" => "benchmarkaveragemaxcpc",
    "entity" => "Partition",
    "fields" => [
        "BenchmarkAverageMaxCpc"
    ],
    "report" => "PRODUCT_PARTITION_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'BenchmarkAverageMaxCpc'}));
    }
];
