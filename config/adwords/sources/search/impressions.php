<?php
return [
    "metric" => "impressions",
    "entity" => "Search",
    "platform" => "adwords",
    "report" => "SEARCH_QUERY_PERFORMANCE_REPORT",
    "fields" => [
        "Impressions"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'Impressions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'impressions'};
            },
            0.0
        );
    }
];
