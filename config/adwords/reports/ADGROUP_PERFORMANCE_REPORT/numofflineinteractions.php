<?php
return [
    "id" => "numofflineinteractions",
    "property" => "NumOfflineInteractions",
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
        "slot"
    ]
];
