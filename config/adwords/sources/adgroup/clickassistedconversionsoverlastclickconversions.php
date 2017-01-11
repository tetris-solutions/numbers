<?php
return [
    "metric" => "clickassistedconversionsoverlastclickconversions",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ClickAssistedConversionsOverLastClickConversions"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'ClickAssistedConversionsOverLastClickConversions'});
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'clickassistedconversionsoverlastclickconversions'};
            },
            0.0
        );
    }
];
