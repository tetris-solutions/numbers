<?php
return [
    "metric" => "contentimpressionshare",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ContentImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->ContentImpressionShare;
    },
    "sum" => function (array $rows) {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->contentimpressionshare;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
