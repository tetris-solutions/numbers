<?php
return [
    "metric" => "viewthroughconversions",
    "entity" => "Budget",
    "platform" => "adwords",
    "report" => "BUDGET_PERFORMANCE_REPORT",
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
