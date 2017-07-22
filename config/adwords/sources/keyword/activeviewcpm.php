<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Keyword",
    "fields" => [
        "ActiveViewCpm"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewCpm'}));
    }
];
