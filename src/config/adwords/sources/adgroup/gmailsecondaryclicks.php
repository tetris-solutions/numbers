<?php
return [
    "metric" => "gmailsecondaryclicks",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "GmailSecondaryClicks"
    ],
    "parse" => function ($data): int {
        return (int)$data->GmailSecondaryClicks;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->gmailsecondaryclicks;
            },
            0.0
        );
    }
];
