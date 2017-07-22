<?php
return [
    "metric" => "historicalqualityscore",
    "entity" => "Keyword",
    "fields" => [
        "HistoricalQualityScore"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'HistoricalQualityScore'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'historicalqualityscore'};
            },
            0.0
        );
    }
];
