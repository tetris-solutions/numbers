<?php
return [
    "metric" => "cpmsignificance",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "CpmSignificance"
    ],
    "parse" => function ($data) {
        return $data->{'CpmSignificance'};
    }
];
