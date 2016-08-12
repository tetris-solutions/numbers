<?php
return [
    "metric" => "clickassistedconversionsoverlastclickconversions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ClickAssistedConversionsOverLastClickConversions"
    ],
    "parse" => function ($data): int {
        return (int)$data->ClickAssistedConversionsOverLastClickConversions;
    },
    "sum" => NULL
];
