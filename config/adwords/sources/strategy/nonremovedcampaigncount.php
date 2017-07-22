<?php
return [
    "metric" => "nonremovedcampaigncount",
    "entity" => "Strategy",
    "fields" => [
        "NonRemovedCampaignCount"
    ],
    "report" => "BID_GOAL_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'NonRemovedCampaignCount'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'nonremovedcampaigncount'};
            },
            0.0
        );
    }
];
