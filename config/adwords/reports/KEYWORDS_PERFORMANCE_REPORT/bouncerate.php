<?php
return [
    "id" => "bouncerate",
    "property" => "BounceRate",
    "is_filter" => TRUE,
    "type" => "percentage",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => TRUE,
    "incompatible" => [
        "clicktype",
        "conversioncategoryname",
        "conversiontrackerid",
        "conversiontypename",
        "device",
        "slot"
    ]
];
