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
        return floatval(str_replace(',', '', $data->{'ActiveViewMeasurability'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'activeviewmeasurability'};
            },
            0.0
        );
    }
];
