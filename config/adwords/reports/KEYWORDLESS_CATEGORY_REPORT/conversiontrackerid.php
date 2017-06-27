<?php
return [
    "id" => "conversiontrackerid",
    "property" => "ConversionTrackerId",
    "is_filter" => TRUE,
    "type" => "integer",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "averagecpc",
        "averagecpm",
        "clicks",
        "conversionrate",
        "conversions",
        "cost",
        "costperconversion",
        "ctr",
        "impressions",
        "valueperconversion"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ConversionTrackerId'}));
    }
];
