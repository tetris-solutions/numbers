<?php
return [
    "metric" => "adgroupcount",
    "entity" => "Strategy",
    "fields" => [
        "AdGroupCount"
    ],
    "report" => "BID_GOAL_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'AdGroupCount'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'adgroupcount'};
            },
            0.0
        );
    }
];
