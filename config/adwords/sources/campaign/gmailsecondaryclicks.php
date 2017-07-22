<?php
return [
    "metric" => "gmailsecondaryclicks",
    "entity" => "Campaign",
    "fields" => [
        "GmailSecondaryClicks"
    ],
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'GmailSecondaryClicks'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'gmailsecondaryclicks'};
            },
            0.0
        );
    }
];
