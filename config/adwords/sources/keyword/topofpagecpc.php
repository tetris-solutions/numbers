<?php
return [
    "metric" => "topofpagecpc",
    "entity" => "Keyword",
    "fields" => [
        "TopOfPageCpc"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'TopOfPageCpc'}));
    }
];
