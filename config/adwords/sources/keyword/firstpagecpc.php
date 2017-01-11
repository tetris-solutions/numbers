<?php
return [
    "metric" => "firstpagecpc",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "FirstPageCpc"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'FirstPageCpc'});
    }
];
