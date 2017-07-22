<?php
return [
    "metric" => "activeviewmeasurableimpressions",
    "entity" => "Placement",
    "fields" => [
        "ActiveViewMeasurableImpressions"
    ],
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ActiveViewMeasurableImpressions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'activeviewmeasurableimpressions'};
            },
            0.0
        );
    }
];
