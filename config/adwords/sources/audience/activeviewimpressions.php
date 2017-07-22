<?php
return [
    "metric" => "activeviewimpressions",
    "entity" => "Audience",
    "fields" => [
        "ActiveViewImpressions"
    ],
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "platform" => "adwords",
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
