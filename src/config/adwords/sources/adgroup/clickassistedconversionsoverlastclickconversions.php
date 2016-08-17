<?php
return [
    "metric" => "clickassistedconversionsoverlastclickconversions",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ClickAssistedConversionsOverLastClickConversions"
    ],
    "parse" => function ($data): int {
        return (int)$data->ClickAssistedConversionsOverLastClickConversions;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->clickassistedconversionsoverlastclickconversions;
            },
            0.0
        );
    }
];
