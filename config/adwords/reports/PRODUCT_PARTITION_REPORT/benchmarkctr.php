<?php
return [
    "id" => "benchmarkctr",
    "property" => "BenchmarkCtr",
    "is_filter" => TRUE,
    "type" => "decimal",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "clicktype",
        "device"
    ]
];
