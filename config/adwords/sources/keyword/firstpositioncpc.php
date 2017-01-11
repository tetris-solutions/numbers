<?php
return [
    "metric" => "firstpositioncpc",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "FirstPositionCpc"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'FirstPositionCpc'});
    }
];
