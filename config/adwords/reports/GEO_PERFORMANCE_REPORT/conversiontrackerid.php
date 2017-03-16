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
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ConversionTrackerId'}));
    }
];
