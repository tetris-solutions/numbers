<?php
return [
    "metric" => "allconversions",
    "entity" => "Budget",
    "platform" => "adwords",
    "report" => "BUDGET_PERFORMANCE_REPORT",
    "fields" => [
        "AllConversions"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AllConversions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'allconversions'};
            },
            0.0
        );
    }
];
