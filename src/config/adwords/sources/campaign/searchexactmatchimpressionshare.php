<?php
return [
    "metric" => "searchexactmatchimpressionshare",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "SearchExactMatchImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->SearchExactMatchImpressionShare;
    },
    "sum" => function (array $rows) {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->searchexactmatchimpressionshare;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
