<?php
return [
    "metric" => "cpcsignificance",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "CpcSignificance"
    ],
    "parse" => function ($data) {
        return $data->{'CpcSignificance'};
    }
];
