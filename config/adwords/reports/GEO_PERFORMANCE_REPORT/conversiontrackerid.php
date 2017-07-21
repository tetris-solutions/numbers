<?php
return [
    "is_filter" => TRUE,
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
    ],
    "id" => "conversiontrackerid",
    "property" => "ConversionTrackerId",
    "type" => "integer",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ConversionTrackerId'}));
    }
];
