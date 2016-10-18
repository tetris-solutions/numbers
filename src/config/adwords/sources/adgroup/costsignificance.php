<?php
return [
    "metric" => "costsignificance",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "CostSignificance"
    ],
    "parse" => function ($data) {
        return $data->CostSignificance;
    }
];
