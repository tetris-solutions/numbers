<?php
return [
    "metric" => "viewthroughconversionssignificance",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ViewThroughConversionsSignificance"
    ],
    "parse" => function ($data) {
        return $data->ViewThroughConversionsSignificance;
    }
];
