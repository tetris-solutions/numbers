<?php
return [
    "metric" => "activeviewmeasurableimpressions",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurableImpressions"
    ],
    "parse" => function ($data): int {
        return (int)$data->ActiveViewMeasurableImpressions;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->activeviewmeasurableimpressions;
            },
            0.0
        );
    }
];
