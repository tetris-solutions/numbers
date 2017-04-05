<?php
return [
    "metric" => "currentmodelattributedconversionvalue",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "CurrentModelAttributedConversionValue"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'CurrentModelAttributedConversionValue'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'currentmodelattributedconversionvalue'};
            },
            0.0
        );
    }
];
