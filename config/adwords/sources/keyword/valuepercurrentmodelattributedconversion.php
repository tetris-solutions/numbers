<?php
return [
    "metric" => "valuepercurrentmodelattributedconversion",
    "entity" => "Keyword",
    "fields" => [
        "ValuePerCurrentModelAttributedConversion"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ValuePerCurrentModelAttributedConversion'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'valuepercurrentmodelattributedconversion'};
            },
            0.0
        );
    }
];
