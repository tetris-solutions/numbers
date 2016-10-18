<?php
return [
    "metric" => "viewthroughconversionssignificance",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ViewThroughConversionsSignificance"
    ],
    "parse" => function ($data) {
        return $data->ViewThroughConversionsSignificance;
    }
];
