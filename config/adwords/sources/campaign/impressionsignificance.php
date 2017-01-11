<?php
return [
    "metric" => "impressionsignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionSignificance"
    ],
    "parse" => function ($data) {
        return $data->{'ImpressionSignificance'};
    }
];
