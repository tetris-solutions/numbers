<?php
return [
    "id" => "historicalcreativequalityscore",
    "property" => "HistoricalCreativeQualityScore",
    "is_filter" => TRUE,
    "type" => "qualityscorebucket",
    "is_metric" => TRUE,
    "is_dimension" => FALSE,
    "is_percentage" => FALSE,
    "values" => [
        "UNKNOWN" => "--",
        "BELOW_AVERAGE" => "Below average",
        "AVERAGE" => "Average",
        "ABOVE_AVERAGE" => "Above average"
    ],
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
