<?php
return [
    "metric" => "currentmodelattributedconversions",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "CurrentModelAttributedConversions"
    ],
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
