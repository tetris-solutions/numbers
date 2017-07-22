<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "AdGroup",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewMeasurableCost'}));
    }
];
