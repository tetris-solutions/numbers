<?php
return [
    "metric" => "averagecost",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCost"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCost;
    },
    "sum" => function (array $rows): float {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->averagecost;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
