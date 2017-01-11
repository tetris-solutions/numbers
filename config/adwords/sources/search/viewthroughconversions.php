<?php
return [
    "metric" => "viewthroughconversions",
    "entity" => "Search",
    "platform" => "adwords",
    "report" => "SEARCH_QUERY_PERFORMANCE_REPORT",
    "fields" => [
        "ViewThroughConversions"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->ViewThroughConversions);
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'viewthroughconversions'};
            },
            0.0
        );
    }
];
