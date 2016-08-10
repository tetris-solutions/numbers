<?php
return [
    "metric" => "convertedclickssignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ConvertedClicksSignificance"
    ],
    "parse" => function ($data): int {
        return (int)$data->ConvertedClicksSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->convertedclickssignificance;
            },
            0.0
        );
    }
];
