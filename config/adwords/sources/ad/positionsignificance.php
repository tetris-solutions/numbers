<?php
return [
    "metric" => "positionsignificance",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "PositionSignificance"
    ],
    "parse" => function ($data) {
        return $data->{'PositionSignificance'};
    }
];
