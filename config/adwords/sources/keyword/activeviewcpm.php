<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCpm"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ActiveViewCpm);
    }
];
