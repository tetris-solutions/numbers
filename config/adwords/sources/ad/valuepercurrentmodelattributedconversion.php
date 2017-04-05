<?php
return [
    "metric" => "valuepercurrentmodelattributedconversion",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerCurrentModelAttributedConversion"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ValuePerCurrentModelAttributedConversion'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'valuepercurrentmodelattributedconversion'};
            },
            0.0
        );
    }
];
