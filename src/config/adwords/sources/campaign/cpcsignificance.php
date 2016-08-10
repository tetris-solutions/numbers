<?php
return [
    "metric" => "cpcsignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "CpcSignificance"
    ],
    "parse" => function ($data): int {
        return (int)$data->CpcSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->cpcsignificance;
            },
            0.0
        );
    }
];
