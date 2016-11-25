<?php
return [
    "metric" => "topofpagecpc",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "TopOfPageCpc"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->TopOfPageCpc);
    }
];
