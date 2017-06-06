<?php
return [
    "metric" => "historicalqualityscore",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "HistoricalQualityScore"
    ],
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
