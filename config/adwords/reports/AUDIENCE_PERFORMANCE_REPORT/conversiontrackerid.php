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
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ConversionTrackerId'}));
    }
];
