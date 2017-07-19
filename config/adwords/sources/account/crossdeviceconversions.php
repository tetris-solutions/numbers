<?php
return [
    "metric" => "crossdeviceconversions",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "CrossDeviceConversions"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'CrossDeviceConversions'}));
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
