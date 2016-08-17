<?php
return [
    "metric" => "gmailforwards",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "GmailForwards"
    ],
    "parse" => function ($data): int {
        return (int)$data->GmailForwards;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->gmailforwards;
            },
            0.0
        );
    }
];
