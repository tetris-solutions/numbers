<?php
return [
    "metric" => "viewthroughconversions",
    "entity" => "Strategy",
    "platform" => "adwords",
    "report" => "BID_GOAL_PERFORMANCE_REPORT",
    "fields" => [
        "ViewThroughConversions"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ViewThroughConversions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'viewthroughconversions'};
            },
            0.0
        );
    }
];
