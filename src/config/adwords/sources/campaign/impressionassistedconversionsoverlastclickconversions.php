<?php
return [
    "metric" => "impressionassistedconversionsoverlastclickconversions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionAssistedConversionsOverLastClickConversions"
    ],
    "parse" => function ($data): int {
        return (int)$data->ImpressionAssistedConversionsOverLastClickConversions;
    },
    "sum" => NULL
    }
];
