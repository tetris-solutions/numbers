<?php
return [
    "metric" => "clickconversionratesignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ClickConversionRateSignificance"
    ],
    "parse" => function ($data): int {
        return (int)$data->ClickConversionRateSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->clickconversionratesignificance;
            },
            0.0
        );
    }
];
