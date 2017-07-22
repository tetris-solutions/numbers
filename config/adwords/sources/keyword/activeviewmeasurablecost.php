<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "Keyword",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewMeasurableCost'}));
    }
];
