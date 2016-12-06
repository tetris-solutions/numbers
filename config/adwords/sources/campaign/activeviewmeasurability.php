<?php
return [
    "metric" => "activeviewmeasurability",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurability"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ActiveViewMeasurability);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->activeviewmeasurability;
            },
            0.0
        );
    }
];
