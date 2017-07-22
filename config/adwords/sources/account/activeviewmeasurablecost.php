<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "Account",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewMeasurableCost'}));
    }
];
