<?php
return [
    "metric" => "campaigncount",
    "entity" => "Strategy",
    "fields" => [
        "CampaignCount"
    ],
    "report" => "BID_GOAL_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'CampaignCount'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'campaigncount'};
            },
            0.0
        );
    }
];
