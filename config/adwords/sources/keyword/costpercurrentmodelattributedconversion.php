<?php
return [
    "metric" => "costpercurrentmodelattributedconversion",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerCurrentModelAttributedConversion"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'CostPerCurrentModelAttributedConversion'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'costpercurrentmodelattributedconversion'};
            },
            0.0
        );
    }
];
