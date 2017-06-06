<?php
return [
    "id" => "historicalqualityscore",
    "property" => "HistoricalQualityScore",
    "is_filter" => TRUE,
    "type" => "integer",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "adnetworktype1",
        "adnetworktype2",
        "clicktype",
        "conversioncategoryname",
        "conversiontrackerid",
        "conversiontypename",
        "device",
        "externalconversionsource",
        "slot"
    ]
];
