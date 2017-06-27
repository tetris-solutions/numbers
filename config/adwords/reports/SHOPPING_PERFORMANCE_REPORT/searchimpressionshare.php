<?php
return [
    "id" => "searchimpressionshare",
    "property" => "SearchImpressionShare",
    "is_filter" => TRUE,
    "type" => "special",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => TRUE,
    "incompatible" => [
        "clicktype",
        "conversioncategoryname",
        "conversiontrackerid",
        "conversiontypename",
        "externalconversionsource",
        "storeid"
    ]
];
