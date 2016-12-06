<?php
return [
    "metric" => "activeviewimpressions",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewImpressions"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->ActiveViewImpressions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->activeviewimpressions;
            },
            0.0
        );
    }
];
