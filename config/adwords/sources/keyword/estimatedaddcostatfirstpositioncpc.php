<?php
return [
    "metric" => "estimatedaddcostatfirstpositioncpc",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "EstimatedAddCostAtFirstPositionCpc"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'EstimatedAddCostAtFirstPositionCpc'});
    }
];
