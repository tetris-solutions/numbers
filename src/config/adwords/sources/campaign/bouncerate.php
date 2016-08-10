<?php
return [
    "metric" => "bouncerate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "BounceRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->BounceRate)) / 100;
    },
    "sum" => function (array $rows): float {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->bouncerate;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
