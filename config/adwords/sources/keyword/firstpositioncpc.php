<?php
return [
    "metric" => "firstpositioncpc",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "FirstPositionCpc"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->FirstPositionCpc);
    }
];
