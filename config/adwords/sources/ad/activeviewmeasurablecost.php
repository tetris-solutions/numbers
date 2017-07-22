<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "Ad",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "report" => "AD_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewMeasurableCost'}));
    }
];
