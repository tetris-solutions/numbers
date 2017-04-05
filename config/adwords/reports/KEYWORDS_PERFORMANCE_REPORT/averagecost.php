<?php
return [
    "id" => "averagecost",
    "property" => "AverageCost",
    "is_filter" => TRUE,
    "type" => "currency",
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
