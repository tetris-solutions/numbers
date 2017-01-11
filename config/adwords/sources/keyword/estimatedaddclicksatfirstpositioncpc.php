<?php
return [
    "metric" => "estimatedaddclicksatfirstpositioncpc",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "EstimatedAddClicksAtFirstPositionCpc"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->EstimatedAddClicksAtFirstPositionCpc);
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
