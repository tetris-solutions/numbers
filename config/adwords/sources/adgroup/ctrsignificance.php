<?php
return [
    "metric" => "ctrsignificance",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "CtrSignificance"
    ],
    "parse" => function ($data) {
        return $data->{'CtrSignificance'};
    }
];
