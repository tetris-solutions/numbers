<?php
return [
    "metric" => "crossdeviceconversions",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "CrossDeviceConversions"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->CrossDeviceConversions);
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'crossdeviceconversions'};
            },
            0.0
        );
    }
];
