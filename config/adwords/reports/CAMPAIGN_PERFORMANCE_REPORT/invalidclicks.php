<?php
return [
    "is_filter" => TRUE,
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "conversioncategoryname",
        "conversiontrackerid",
        "conversiontypename",
        "externalconversionsource",
        "hourofday",
        "slot"
    ],
    "id" => "invalidclicks",
    "property" => "InvalidClicks",
    "type" => "integer"
];
