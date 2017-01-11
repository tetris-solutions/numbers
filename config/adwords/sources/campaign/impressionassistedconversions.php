<?php
return [
    "metric" => "impressionassistedconversions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionAssistedConversions"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ImpressionAssistedConversions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'impressionassistedconversions'};
            },
            0.0
        );
    }
];
