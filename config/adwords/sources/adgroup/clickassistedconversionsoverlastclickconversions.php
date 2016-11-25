<?php
return [
    "metric" => "clickassistedconversionsoverlastclickconversions",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ClickAssistedConversionsOverLastClickConversions"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ClickAssistedConversionsOverLastClickConversions);
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
