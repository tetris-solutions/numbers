<?php
return [
    "metric" => "crossdeviceconversions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "CrossDeviceConversions"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->CrossDeviceConversions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->crossdeviceconversions;
            },
            0.0
        );
    }
];
