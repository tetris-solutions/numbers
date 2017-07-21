<?php
return [
    "is_filter" => TRUE,
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => TRUE,
    "incompatible" => [
        "clicktype",
        "conversioncategoryname",
        "conversiontrackerid",
        "conversiontypename",
        "device",
        "externalconversionsource",
        "hourofday",
        "slot"
    ],
    "id" => "bouncerate",
    "property" => "BounceRate",
    "type" => "percentage"
];
