<?php
return [
    "metric" => "impressions",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "Impressions"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->Impressions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->impressions;
            },
            0.0
        );
    }
];
