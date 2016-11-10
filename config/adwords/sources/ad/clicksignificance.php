<?php
return [
    "metric" => "clicksignificance",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ClickSignificance"
    ],
    "parse" => function ($data) {
        return $data->ClickSignificance;
    }
];
