<?php
return [
    "metric" => "ctrsignificance",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "CtrSignificance"
    ],
    "parse" => function ($data) {
        return $data->{'CtrSignificance'};
    }
];
