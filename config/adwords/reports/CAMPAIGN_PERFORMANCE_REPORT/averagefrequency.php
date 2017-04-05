<?php
return [
    "id" => "averagefrequency",
    "property" => "AverageFrequency",
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
        "dayofweek",
        "device",
        "externalconversionsource",
        "hourofday",
        "quarter",
        "slot",
        "year"
    ]
];
