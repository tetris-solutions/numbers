<?php
return [
    "metric" => "activeviewimpressions",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewImpressions"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ActiveViewImpressions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'activeviewimpressions'};
            },
            0.0
        );
    }
];
