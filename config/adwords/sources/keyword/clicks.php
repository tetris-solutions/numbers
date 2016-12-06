<?php
return [
    "metric" => "clicks",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "Clicks"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->Clicks);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->clicks;
            },
            0.0
        );
    }
];
