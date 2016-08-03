<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "parse" => function ($data): float {
      return (float)$data->ActiveViewMeasurableCost;
    }
];
