<?php
return [
    "metric" => "gmailsecondaryclicks",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
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
