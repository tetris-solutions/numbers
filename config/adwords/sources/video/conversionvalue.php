<?php
return [
    "metric" => "conversionvalue",
    "entity" => "Video",
    "fields" => [
        "ConversionValue"
    ],
    "report" => "VIDEO_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ConversionValue'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'conversionvalue'};
            },
            0.0
        );
    }
];
