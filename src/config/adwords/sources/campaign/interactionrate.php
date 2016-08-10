<?php
return [
    "metric" => "interactionrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->InteractionRate)) / 100;
    },
    "sum" => function (array $rows): float {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->interactionrate;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
