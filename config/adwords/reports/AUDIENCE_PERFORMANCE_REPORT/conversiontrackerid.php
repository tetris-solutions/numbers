<?php
return [
    "is_filter" => TRUE,
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "activeviewcpm",
        "activeviewctr",
        "activeviewimpressions",
        "activeviewmeasurability",
        "activeviewmeasurablecost",
        "activeviewmeasurableimpressions",
        "activeviewviewability",
        "averagecost",
        "averagecpc",
        "averagecpe",
        "averagecpm",
        "averagecpv",
        "averageposition",
        "clicks",
        "cost",
        "ctr",
        "engagementrate",
        "engagements",
        "impressions",
        "interactionrate",
        "interactiontypes",
        "interactions",
        "videoquartile100rate",
        "videoquartile25rate",
        "videoquartile50rate",
        "videoquartile75rate",
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
