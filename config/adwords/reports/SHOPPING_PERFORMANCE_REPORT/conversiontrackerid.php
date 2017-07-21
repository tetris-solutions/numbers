<?php
return [
    "is_filter" => TRUE,
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
    "id" => "conversiontrackerid",
    "property" => "ConversionTrackerId",
    "type" => "integer",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ConversionTrackerId'}));
    }
];
