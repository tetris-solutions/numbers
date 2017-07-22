<?php
return [
    "metric" => "viewthroughconversions",
    "entity" => "Location",
    "fields" => [
        "ViewThroughConversions"
    ],
    "report" => "GEO_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ViewThroughConversions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'viewthroughconversions'};
            },
            0.0
        );
    }
];
