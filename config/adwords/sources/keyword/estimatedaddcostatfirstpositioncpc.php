<?php
return [
    "metric" => "estimatedaddcostatfirstpositioncpc",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "EstimatedAddCostAtFirstPositionCpc"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'EstimatedAddCostAtFirstPositionCpc'}));
    }
];
