<?php
return [
    "metric" => "viewthroughconversionssignificance",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ViewThroughConversionsSignificance"
    ],
    "parse" => function ($data) {
        return $data->{'ViewThroughConversionsSignificance'};
    }
];
