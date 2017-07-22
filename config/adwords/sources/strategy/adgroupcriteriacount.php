<?php
return [
    "metric" => "adgroupcriteriacount",
    "entity" => "Strategy",
    "fields" => [
        "AdGroupCriteriaCount"
    ],
    "report" => "BID_GOAL_PERFORMANCE_REPORT",
    "platform" => "adwords",
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
