<?php
return [
    "id" => "gmailsecondaryclicks",
    "property" => "GmailSecondaryClicks",
    "is_filter" => TRUE,
    "type" => "integer",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "conversioncategoryname",
        "conversiontrackerid",
        "conversiontypename",
        "externalconversionsource"
    ]
];
