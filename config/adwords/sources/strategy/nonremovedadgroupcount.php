<?php
return [
    "metric" => "nonremovedadgroupcount",
    "entity" => "Strategy",
    "platform" => "adwords",
    "report" => "BID_GOAL_PERFORMANCE_REPORT",
    "fields" => [
        "NonRemovedAdGroupCount"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'NonRemovedAdGroupCount'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'nonremovedadgroupcount'};
            },
            0.0
        );
    }
];
