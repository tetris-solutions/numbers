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
        return floatval(str_replace(',', '', $data->{'ActiveViewCpm'}));
    }
];
