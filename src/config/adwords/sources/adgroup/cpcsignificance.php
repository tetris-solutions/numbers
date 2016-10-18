<?php
return [
    "metric" => "cpcsignificance",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "CpcSignificance"
    ],
    "parse" => function ($data) {
        return $data->CpcSignificance;
    }
];
