<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "Campaign",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewMeasurableCost'}));
    }
];
