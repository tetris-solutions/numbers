<?php
return [
    "metric" => "gmailsaves",
    "entity" => "Audience",
    "fields" => [
        "GmailSaves"
    ],
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'GmailSaves'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'gmailsaves'};
            },
            0.0
        );
    }
];
