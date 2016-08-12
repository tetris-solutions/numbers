<?php
return [
    "metric" => "invalidclickrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["clicks", "invalidclicks"],
    "fields" => [
        "InvalidClickRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->InvalidClickRate)) / 100;
    },
    "sum" => function (array $rows) {
        $sumClicks = 0;
        $sumInvalidClicks = 0;

        foreach ($rows as $row) {
            $sumClicks += $row->clicks;
            $sumInvalidClicks += $row->invalidclicks;
        }

        return $sumClicks !== 0
            ? $sumInvalidClicks / $sumClicks
            : 0;
    }
];
