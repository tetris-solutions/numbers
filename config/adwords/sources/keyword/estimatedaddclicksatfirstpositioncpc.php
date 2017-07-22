<?php
return [
    "metric" => "estimatedaddclicksatfirstpositioncpc",
    "entity" => "Keyword",
    "fields" => [
        "EstimatedAddClicksAtFirstPositionCpc"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'EstimatedAddClicksAtFirstPositionCpc'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'estimatedaddclicksatfirstpositioncpc'};
            },
            0.0
        );
    }
];
