<?php
return [
    "id" => "impressionreach",
    "property" => "ImpressionReach",
    "is_filter" => TRUE,
    "type" => "special",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "clicktype",
        "conversioncategoryname",
        "conversiontrackerid",
        "conversiontypename",
        "dayofweek",
        "device",
        "externalconversionsource",
        "hourofday",
        "quarter",
        "slot",
        "year"
    ]
];
