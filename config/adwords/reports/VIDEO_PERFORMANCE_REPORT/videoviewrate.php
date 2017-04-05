<?php
return [
    "id" => "videoviewrate",
    "property" => "VideoViewRate",
    "is_filter" => TRUE,
    "type" => "percentage",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => TRUE,
    "incompatible" => [
        "clicktype",
        "conversioncategoryname",
        "conversiontypename",
        "externalconversionsource"
    ]
];
