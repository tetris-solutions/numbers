<?php
return [
    "metric" => "clickconversionrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ClickConversionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->ClickConversionRate)) / 100;
    },
    "sum" => function (array $rows): float {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->clickconversionrate;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
