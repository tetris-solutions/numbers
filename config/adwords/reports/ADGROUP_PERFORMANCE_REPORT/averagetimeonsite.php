<?php
return [
    "id" => "averagetimeonsite",
    "property" => "AverageTimeOnSite",
    "is_filter" => TRUE,
    "type" => "decimal",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "clicktype",
        "conversioncategoryname",
        "conversiontrackerid",
        "conversiontypename",
        "device",
        "hourofday",
        "slot"
    ]
];
