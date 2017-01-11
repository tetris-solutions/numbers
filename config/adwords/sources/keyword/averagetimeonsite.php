<?php
return [
    "metric" => "averagetimeonsite",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "AverageTimeOnSite"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AverageTimeOnSite'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'averagetimeonsite'};
            },
            0.0
        );
    }
];
