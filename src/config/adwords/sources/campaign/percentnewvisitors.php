<?php
return [
    "metric" => "percentnewvisitors",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "PercentNewVisitors"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->PercentNewVisitors)) / 100;
    },
    "sum" => function (array $rows): float {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->percentnewvisitors;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
