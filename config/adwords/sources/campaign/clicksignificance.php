<?php
return [
    "metric" => "clicksignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ClickSignificance"
    ],
    "parse" => function ($data) {
        return $data->ClickSignificance;
    }
];
