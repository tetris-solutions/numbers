<?php
return [
    "metric" => "costperconvertedclicksignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerConvertedClickSignificance"
    ],
    "parse" => function ($data): int {
        return (int)$data->CostPerConvertedClickSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->costperconvertedclicksignificance;
            },
            0.0
        );
    }
];
