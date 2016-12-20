<?php
return [
    "metric" => "gmailforwards",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "GmailForwards"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->GmailForwards);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->gmailforwards;
            },
            0.0
        );
    }
];
