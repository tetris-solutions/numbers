<?php
return [
    "metric" => "gmailsaves",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "GmailSaves"
    ],
    "parse" => function ($data): int {
        return (int)$data->GmailSaves;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->gmailsaves;
            },
            0.0
        );
    }
];
