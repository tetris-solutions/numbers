<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "Placement",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewMeasurableCost'}));
    }
];
