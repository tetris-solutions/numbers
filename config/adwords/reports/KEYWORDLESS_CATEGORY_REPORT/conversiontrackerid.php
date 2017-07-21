<?php
return [
    "is_filter" => TRUE,
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
    "id" => "conversiontrackerid",
    "property" => "ConversionTrackerId",
    "type" => "integer",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ConversionTrackerId'}));
    }
];
