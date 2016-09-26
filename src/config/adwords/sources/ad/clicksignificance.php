<?php
return [
    "metric" => "clicksignificance",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ClickSignificance"
    ],
    "parse" => function ($data): float {
        return (float)$data->ClickSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->clicksignificance;
            },
            0.0
        );
    }
];
