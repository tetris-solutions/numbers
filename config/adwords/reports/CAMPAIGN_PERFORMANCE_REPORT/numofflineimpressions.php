<?php
return [
    "id" => "numofflineimpressions",
    "property" => "NumOfflineImpressions",
    "is_filter" => TRUE,
    "type" => "integer",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "conversioncategoryname",
        "conversiontrackerid",
        "conversiontypename",
        "device",
        "externalconversionsource",
        "slot"
    ]
];
