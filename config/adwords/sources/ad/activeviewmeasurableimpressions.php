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
        return (int)str_replace(',', '', $data->{'ActiveViewMeasurableImpressions'});
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
