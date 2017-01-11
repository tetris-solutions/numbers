<?php
return [
    "metric" => "clicksignificance",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ClickSignificance"
    ],
    "parse" => function ($data) {
        return $data->{'ClickSignificance'};
    }
];
