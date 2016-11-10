<?php
return [
    "metric" => "searchranklostimpressionshare",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "SearchRankLostImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->SearchRankLostImpressionShare;
    }
];
