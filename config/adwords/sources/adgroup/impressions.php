<?php
return [
    "metric" => "impressions",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "KEYWORDLESS_QUERY_REPORT",
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
