<?php
return [
    "metric" => "nonremovedadgroupcriteriacount",
    "entity" => "Strategy",
    "fields" => [
        "NonRemovedAdGroupCriteriaCount"
    ],
    "report" => "BID_GOAL_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'NonRemovedAdGroupCriteriaCount'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'nonremovedadgroupcriteriacount'};
            },
            0.0
        );
    }
];
