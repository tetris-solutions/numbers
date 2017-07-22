<?php
return [
    "metric" => "clickassistedconversions",
    "entity" => "AdGroup",
    "fields" => [
        "ClickAssistedConversions"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ClickAssistedConversions'}));
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
