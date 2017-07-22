<?php
return [
    "metric" => "conversions",
    "entity" => "Partition",
    "fields" => [
        "Conversions"
    ],
    "report" => "PRODUCT_PARTITION_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'Conversions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'conversions'};
            },
            0.0
        );
    }
];
