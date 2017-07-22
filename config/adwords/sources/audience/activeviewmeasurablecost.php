<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "Audience",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewMeasurableCost'}));
    }
];
