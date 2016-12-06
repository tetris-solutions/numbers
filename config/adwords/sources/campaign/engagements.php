<?php
return [
    "metric" => "engagements",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "Engagements"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->Engagements);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->engagements;
            },
            0.0
        );
    }
];
