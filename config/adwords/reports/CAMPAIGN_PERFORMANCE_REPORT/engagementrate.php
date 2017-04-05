<?php
return [
    "id" => "engagementrate",
    "property" => "EngagementRate",
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
        "externalconversionsource"
    ]
];
