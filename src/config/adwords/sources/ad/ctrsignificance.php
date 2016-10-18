<?php
return [
    "metric" => "ctrsignificance",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "CtrSignificance"
    ],
    "parse" => function ($data) {
        return $data->CtrSignificance;
    }
];
