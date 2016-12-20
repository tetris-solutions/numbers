<?php
return [
    "metric" => "viewthroughconversions",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "ViewThroughConversions"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->ViewThroughConversions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->viewthroughconversions;
            },
            0.0
        );
    }
];
