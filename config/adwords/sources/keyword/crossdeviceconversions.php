<?php
return [
    "metric" => "crossdeviceconversions",
    "entity" => "Keyword",
    "fields" => [
        "CrossDeviceConversions"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
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
