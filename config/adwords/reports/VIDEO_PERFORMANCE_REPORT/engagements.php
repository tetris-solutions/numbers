<?php
return [
    "id" => "engagements",
    "property" => "Engagements",
    "is_filter" => TRUE,
    "type" => "integer",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "clicktype",
        "conversioncategoryname",
        "conversiontypename"
    ]
];
