<?php
return [
    "metric" => "gmailsaves",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "GmailSaves"
    ],
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
