<?php
return [
    "metric" => "adgroupcriteriacount",
    "entity" => "Strategy",
    "platform" => "adwords",
    "report" => "BID_GOAL_PERFORMANCE_REPORT",
    "fields" => [
        "AdGroupCriteriaCount"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'AdGroupCriteriaCount'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'adgroupcriteriacount'};
            },
            0.0
        );
    }
];
