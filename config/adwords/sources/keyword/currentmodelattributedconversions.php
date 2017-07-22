<?php
return [
    "metric" => "currentmodelattributedconversions",
    "entity" => "Keyword",
    "fields" => [
        "CurrentModelAttributedConversions"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'CurrentModelAttributedConversions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'currentmodelattributedconversions'};
            },
            0.0
        );
    }
];
