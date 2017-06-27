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
        "clicks",
        "cost",
        "ctr",
        "impressions",
        "searchclickshare",
        "searchimpressionshare"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ConversionTrackerId'}));
    }
];
