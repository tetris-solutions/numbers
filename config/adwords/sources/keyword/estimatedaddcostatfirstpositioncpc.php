<?php
return [
    "metric" => "estimatedaddcostatfirstpositioncpc",
    "entity" => "Keyword",
    "fields" => [
        "EstimatedAddCostAtFirstPositionCpc"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'EstimatedAddCostAtFirstPositionCpc'}));
    }
];
