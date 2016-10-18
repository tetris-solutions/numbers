<?php
return [
    "metric" => "costsignificance",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "CostSignificance"
    ],
    "parse" => function ($data) {
        return $data->CostSignificance;
    }
];
