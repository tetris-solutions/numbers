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
        "averagecpc",
        "clicks",
        "cost",
        "ctr",
        "impressions",
        "searchclickshare",
        "searchimpressionshare"
    ]
];
