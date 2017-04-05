<?php
return [
    "id" => "percentnewvisitors",
    "property" => "PercentNewVisitors",
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
        "externalconversionsource",
        "hourofday",
        "slot"
    ]
];
