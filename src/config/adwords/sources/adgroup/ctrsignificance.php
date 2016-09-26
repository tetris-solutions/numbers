<?php
return [
    "metric" => "ctrsignificance",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "CtrSignificance"
    ],
    "parse" => function ($data): float {
        return (float)$data->CtrSignificance;
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
