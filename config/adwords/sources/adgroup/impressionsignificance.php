<?php
return [
    "metric" => "impressionsignificance",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionSignificance"
    ],
    "parse" => function ($data) {
        return $data->{'ImpressionSignificance'};
    }
];
