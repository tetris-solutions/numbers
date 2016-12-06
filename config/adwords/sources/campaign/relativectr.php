<?php
return [
    "metric" => "relativectr",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "RelativeCtr"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->RelativeCtr);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->relativectr;
            },
            0.0
        );
    }
];
