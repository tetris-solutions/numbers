<?php
return [
    "id" => "impressions",
    "property" => "Impressions",
    "is_filter" => TRUE,
    "type" => "integer",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "conversioncategoryname",
        "conversiontypename",
        "externalconversionsource"
    ]
];
