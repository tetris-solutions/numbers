<?php
return [
    "metric" => "firstpositioncpc",
    "entity" => "Keyword",
    "fields" => [
        "FirstPositionCpc"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'FirstPositionCpc'}));
    }
];
