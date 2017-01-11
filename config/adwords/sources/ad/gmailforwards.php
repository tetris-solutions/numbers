<?php
return [
    "metric" => "gmailforwards",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "GmailForwards"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->GmailForwards);
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
