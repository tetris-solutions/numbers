<?php
return [
    "id" => "averageposition",
    "property" => "AveragePosition",
    "is_filter" => TRUE,
    "type" => "decimal",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "conversioncategoryname",
        "conversiontrackerid",
        "conversiontypename",
        "externalconversionsource"
    ]
];
