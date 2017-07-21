<?php
return [
    "is_filter" => TRUE,
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
    ],
    "id" => "averagefrequency",
    "property" => "AverageFrequency",
    "type" => "decimal"
];
