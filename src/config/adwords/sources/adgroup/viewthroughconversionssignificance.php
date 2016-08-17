<?php
return [
    "metric" => "viewthroughconversionssignificance",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ViewThroughConversionsSignificance"
    ],
    "parse" => function ($data): int {
        return (int)$data->ViewThroughConversionsSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->viewthroughconversionssignificance;
            },
            0.0
        );
    }
];
