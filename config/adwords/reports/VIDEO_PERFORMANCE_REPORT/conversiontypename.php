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
        "averagecpm",
        "averagecpv",
        "clicks",
        "conversionrate",
        "conversions",
        "cost",
        "costperconversion",
        "ctr",
        "engagementrate",
        "engagements",
        "impressions",
        "videoquartile100rate",
        "videoquartile25rate",
        "videoquartile50rate",
        "videoquartile75rate",
        "videoviewrate",
        "videoviews"
    ]
];
