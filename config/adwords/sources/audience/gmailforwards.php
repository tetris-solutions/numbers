<?php
return [
    "metric" => "gmailforwards",
    "entity" => "Audience",
    "fields" => [
        "GmailForwards"
    ],
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'GmailForwards'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'gmailforwards'};
            },
            0.0
        );
    }
];
