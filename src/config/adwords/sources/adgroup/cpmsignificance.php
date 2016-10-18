<?php
return [
    "metric" => "cpmsignificance",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "CpmSignificance"
    ],
    "parse" => function ($data) {
        return $data->CpmSignificance;
    }
];
