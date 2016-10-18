<?php
return [
    "metric" => "impressionsignificance",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionSignificance"
    ],
    "parse" => function ($data) {
        return $data->ImpressionSignificance;
    }
];
