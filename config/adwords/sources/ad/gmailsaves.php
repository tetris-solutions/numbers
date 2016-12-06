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
        return (int)str_replace(',', '', $data->GmailSaves);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->gmailsaves;
            },
            0.0
        );
    }
];
