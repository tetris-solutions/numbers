<?php
return [
    "id" => "averagecpv",
    "property" => "AverageCpv",
    "is_filter" => TRUE,
    "type" => "currency",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "conversioncategoryname",
        "conversiontrackerid",
        "conversiontypename"
    ]
];
