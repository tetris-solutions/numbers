<?php
return [
    "metric" => "cost",
    "entity" => "Category",
    "fields" => [
        "Cost"
    ],
    "report" => "KEYWORDLESS_CATEGORY_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'Cost'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'cost'};
            },
            0.0
        );
    }
];
