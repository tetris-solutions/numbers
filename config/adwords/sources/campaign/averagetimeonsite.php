<?php
return [
    "metric" => "averagetimeonsite",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AverageTimeOnSite"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->AverageTimeOnSite);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->averagetimeonsite;
            },
            0.0
        );
    }
];
