<?php
return [
    "metric" => "gmailsecondaryclicks",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "GmailSecondaryClicks"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->GmailSecondaryClicks);
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
