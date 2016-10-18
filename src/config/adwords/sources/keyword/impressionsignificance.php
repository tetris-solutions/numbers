<?php
return [
    "metric" => "impressionsignificance",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionSignificance"
    ],
    "parse" => function ($data) {
        return $data->ImpressionSignificance;
    }
];
