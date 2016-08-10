<?php
return [
    "metric" => "ctr",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "Ctr"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->Ctr)) / 100;
    },
    "sum" => function (array $rows): float {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->ctr;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
