<?php
return [
    "metric" => "clickassistedconversions",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ClickAssistedConversions"
    ],
    "parse" => function ($data): int {
        return (int)$data->ClickAssistedConversions;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->clickassistedconversions;
            },
            0.0
        );
    }
];
