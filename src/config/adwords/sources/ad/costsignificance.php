<?php
return [
    "metric" => "costsignificance",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "CostSignificance"
    ],
    "parse" => function ($data): float {
        return (float)$data->CostSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->costsignificance;
            },
            0.0
        );
    }
];
