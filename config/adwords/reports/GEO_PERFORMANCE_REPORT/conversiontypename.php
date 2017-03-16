<?php
return [
    "id" => "conversiontypename",
    "property" => "ConversionTypeName",
    "is_filter" => TRUE,
    "type" => "string",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "averagecost",
        "averagecpc",
        "averagecpm",
        "averagecpv",
        "averageposition",
        "clicks",
        "cost",
        "ctr",
        "impressions",
        "interactionrate",
        "interactiontypes",
        "interactions",
        "videoviewrate",
        "videoviews"
    ]
];
