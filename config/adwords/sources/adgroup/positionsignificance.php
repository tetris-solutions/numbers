<?php
return [
    "metric" => "positionsignificance",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "PositionSignificance"
    ],
    "parse" => function ($data) {
        return $data->{'PositionSignificance'};
    }
];
