<?php
return [
    "metric" => "videoquartile50rate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile50Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoQuartile50Rate)) / 100;
    },
    "sum" => function (array $rows) {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->videoquartile50rate;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
