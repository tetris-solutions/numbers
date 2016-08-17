<?php
return [
    "metric" => "ctrsignificance",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "CtrSignificance"
    ],
    "parse" => function ($data): int {
        return (int)$data->CtrSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->ctrsignificance;
            },
            0.0
        );
    }
];
