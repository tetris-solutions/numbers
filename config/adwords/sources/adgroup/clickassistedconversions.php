<?php
return [
    "metric" => "clickassistedconversions",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ClickAssistedConversions"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->ClickAssistedConversions);
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'clickassistedconversions'};
            },
            0.0
        );
    }
];
